<?php

namespace Tests\Feature;

use App\Models\Deposit;
use App\Models\PaymentMethod;
use App\Models\User;
use App\Models\withdrawal;
use Database\Seeders\PaymentMethodSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class PaymentMethodSystemTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed(PaymentMethodSeeder::class);
    }

    protected function makeUser(array $attrs = []): User
    {
        return User::factory()->create(array_merge(['role' => 1, 'account_bal' => 5000], $attrs));
    }

    protected function makeAdmin(): User
    {
        return User::factory()->create(['role' => 2]);
    }

    public function test_default_payment_methods_seeded(): void
    {
        $this->assertSame(8, PaymentMethod::count());
        $this->assertTrue(PaymentMethod::where('name', 'USDT')->exists());
        $usdt = PaymentMethod::where('name', 'USDT')->first();
        $network = $usdt->fields()->where('label', 'Network')->first();
        $this->assertNotNull($network);
        $this->assertSame(['TRC20', 'ERC20', 'BEP20'], $network->options_list);
    }

    public function test_recharge_page_lists_only_active_methods(): void
    {
        $user = $this->makeUser();
        $paypal = PaymentMethod::where('name', 'PayPal')->first();
        $paypal->update(['is_active' => false]);

        $response = $this->actingAs($user)->get(route('recharge.index'));

        $response->assertOk();
        $response->assertSee('Bank Transfer');
        // The method card links to recharge.show; the legacy modal must not count.
        $response->assertDontSee(route('recharge.show', $paypal), false);
    }

    public function test_recharge_requires_active_method_and_validates_dynamic_fields(): void
    {
        Storage::fake('public');
        $user = $this->makeUser();
        $usdt = PaymentMethod::where('name', 'USDT')->first();
        $usdt->update(['min_deposit' => 100]);

        // Inactive method → 404 on form, 403 on submit.
        $usdt->update(['is_active' => false]);
        $this->actingAs($user)->get(route('recharge.show', $usdt))->assertNotFound();
        $usdt->update(['is_active' => true]);

        // Missing required dynamic field + below minimum → validation errors, no record.
        $response = $this->actingAs($user)->post(route('recharge.store', $usdt), [
            'amount' => 10,
            'fields' => ['wallet_address' => 'abc'],
            'proof' => UploadedFile::fake()->image('proof.jpg'),
        ]);
        $response->assertSessionHasErrors(['amount', 'fields.network']);
        $this->assertSame(0, Deposit::count());

        // Unknown injected field names are stripped, valid submit creates pending deposit with snapshot.
        $response = $this->actingAs($user)->post(route('recharge.store', $usdt), [
            'amount' => 150,
            'fields' => [
                'wallet_address' => '  TXYZ123  ',
                'network' => 'TRC20',
                'hacker_field' => 'evil',
            ],
            'proof' => UploadedFile::fake()->image('proof.jpg'),
        ]);
        $response->assertRedirect(route('transaction_history'));

        $deposit = Deposit::first();
        $this->assertSame(Deposit::STATUS_PENDING, (int) $deposit->status);
        $this->assertSame('TXYZ123', $deposit->details['wallet_address']);
        $this->assertArrayNotHasKey('hacker_field', $deposit->details);
        $this->assertSame('USDT', $deposit->method_snapshot['method_name']);
        $this->assertNotNull($deposit->reference);
        $this->assertSame($user->id, $deposit->user_id);
        // Balance untouched until approval.
        $this->assertSame(5000, (int) $user->fresh()->account_bal);
    }

    public function test_deposit_approval_is_idempotent(): void
    {
        $user = $this->makeUser(['account_bal' => 100]);
        $admin = $this->makeAdmin();
        $method = PaymentMethod::where('name', 'PayPal')->first();

        $deposit = Deposit::create([
            'user_id' => $user->id,
            'payment_method_id' => $method->id,
            'reference' => 'RCH-TEST-1',
            'amount' => 200,
            'payment_method' => 'PayPal',
            'status' => Deposit::STATUS_PENDING,
        ]);

        $this->actingAs($admin)->post(route('admin_deposits.approve', $deposit))->assertRedirect();
        $this->assertSame(300, (int) $user->fresh()->account_bal);

        // Second approval must not credit again.
        $this->actingAs($admin)->post(route('admin_deposits.approve', $deposit))->assertRedirect();
        $this->assertSame(300, (int) $user->fresh()->account_bal);
        $this->assertSame(Deposit::STATUS_APPROVED, (int) $deposit->fresh()->status);
    }

    public function test_withdrawal_rejection_refunds_exactly_once(): void
    {
        $user = $this->makeUser(['account_bal' => 4000]);
        $admin = $this->makeAdmin();
        $method = PaymentMethod::where('name', 'Bank Transfer')->first();

        $withdrawal = withdrawal::create([
            'user_id' => $user->id,
            'payment_method_id' => $method->id,
            'reference' => 'WDL-TEST-1',
            'amount' => 1000,
            'account_name' => 'John',
            'bank_name' => 'Bank Transfer',
            'account_number' => '123',
            'account_type' => 'Bank',
            'address' => '-',
            'swift_bic_code' => '-',
            'status' => withdrawal::STATUS_PENDING,
        ]);
        // Simulate deduction at request time.
        $user->decrement('account_bal', 1000);
        $this->assertSame(3000, (int) $user->fresh()->account_bal);

        $this->actingAs($admin)->post(route('admin_withdrawals.reject', $withdrawal), ['admin_remark' => 'Bad details'])->assertRedirect();
        $this->assertSame(4000, (int) $user->fresh()->account_bal);

        $this->actingAs($admin)->post(route('admin_withdrawals.reject', $withdrawal))->assertRedirect();
        $this->assertSame(4000, (int) $user->fresh()->account_bal);
        $this->assertSame('Bad details', $withdrawal->fresh()->admin_remark);
    }

    public function test_withdrawal_approval_does_not_change_balance(): void
    {
        $user = $this->makeUser(['account_bal' => 3000]);
        $admin = $this->makeAdmin();
        $method = PaymentMethod::where('name', 'Bank Transfer')->first();

        $withdrawal = withdrawal::create([
            'user_id' => $user->id,
            'payment_method_id' => $method->id,
            'amount' => 500,
            'account_name' => 'John',
            'bank_name' => 'Bank Transfer',
            'account_number' => '123',
            'account_type' => 'Bank',
            'address' => '-',
            'swift_bic_code' => '-',
            'status' => withdrawal::STATUS_PENDING,
        ]);

        $this->actingAs($admin)->post(route('admin_withdrawals.approve', $withdrawal))->assertRedirect();
        $this->assertSame(3000, (int) $user->fresh()->account_bal);
    }

    public function test_admin_can_create_method_with_fields_and_it_appears_for_users(): void
    {
        $admin = $this->makeAdmin();
        $user = $this->makeUser();

        $response = $this->actingAs($admin)->post(route('admin_payment_methods.store'), [
            'name' => 'Zelle',
            'type' => 'fast_payment',
            'description' => 'Pay with Zelle.',
            'deposit_enabled' => '1',
            'withdrawal_enabled' => '1',
            'is_active' => '1',
            'sort_order' => 0,
            'fields' => [
                ['label' => 'Zelle Email', 'type' => 'email', 'is_required' => '1', 'show_on' => 'both', 'sort_order' => 1, 'is_active' => '1'],
                ['label' => 'Recipient Name', 'type' => 'text', 'show_on' => 'both', 'sort_order' => 2, 'is_active' => '1'],
            ],
        ]);
        $response->assertRedirect();

        $zelle = PaymentMethod::where('name', 'Zelle')->firstOrFail();
        $this->assertCount(2, $zelle->fields);

        $page = $this->actingAs($user)->get(route('recharge.index'));
        $page->assertOk()->assertSee('Zelle');

        $form = $this->actingAs($user)->get(route('recharge.show', $zelle));
        $form->assertOk()->assertSee('Zelle Email');
    }

    public function test_method_with_transactions_cannot_be_deleted(): void
    {
        $admin = $this->makeAdmin();
        $user = $this->makeUser();
        $method = PaymentMethod::where('name', 'PayPal')->first();

        Deposit::create([
            'user_id' => $user->id, 'payment_method_id' => $method->id,
            'amount' => 50, 'payment_method' => 'PayPal', 'status' => Deposit::STATUS_PENDING,
        ]);

        $this->actingAs($admin)->delete(route('admin_payment_methods.destroy', $method))->assertRedirect();
        $this->assertTrue(PaymentMethod::whereKey($method->id)->exists());
    }

    public function test_non_admin_cannot_access_admin_payment_routes(): void
    {
        $user = $this->makeUser();
        $this->actingAs($user)->get(route('admin_payment_methods.index'))->assertRedirect();
        $this->actingAs($user)->get(route('admin_deposits.index'))->assertRedirect();
    }
}
