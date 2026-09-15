<?php

namespace App\Livewire\Admin;

use App\Models\User;
use App\Jobs\SendMail;
use App\Models\Deposit;
use App\Models\withdrawal;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Transactions extends Component
{
    public $user_data;

    /** Admin remarks keyed by transaction id, used when rejecting. */
    public $remarks = [];

    protected function findDeposit(int $id): ?Deposit
    {
        return Deposit::where('id', $id)->where('user_id', $this->user_data->id)->first();
    }

    protected function findWithdrawal(int $id): ?withdrawal
    {
        return withdrawal::where('id', $id)->where('user_id', $this->user_data->id)->first();
    }

    protected function mailUser(string $email, string $subject, array $bodyUser, array $bodyAdmin): void
    {
        SendMail::dispatch($email, $subject, $bodyUser, $bodyAdmin);
    }

    public function approve($id)
    {
        $user = $this->user_data;
        $current_deposit = $this->findDeposit((int) $id);

        if (! $current_deposit) {
            session()->flash('error', 'Deposit not found for this user.');
            return redirect()->route('admin_editUser', [$user->id])->with('wire:navigate', true);
        }

        $credited = DB::transaction(function () use ($current_deposit) {
            $fresh = Deposit::whereKey($current_deposit->id)->lockForUpdate()->firstOrFail();

            if ((int) $fresh->status !== Deposit::STATUS_PENDING) {
                return false; // already reviewed — never credit twice
            }

            $fresh->update(['status' => Deposit::STATUS_APPROVED]);
            User::whereKey($fresh->user_id)->lockForUpdate()->increment('account_bal', $fresh->amount);

            return true;
        });

        $current_deposit->refresh();

        if ($credited) {
            $app = config('app.name');
            $this->mailUser($user->email, 'Deposit Approval Notification', [
                "name" => $user->name,
                "title" => "Deposit Approval Notification",
                "message" => "We have successfully approved your deposit request of \${$current_deposit->amount} through {$current_deposit->method_name}, Your account have been credited.
                <br>
                <br>
                Thanks For Trusting Our Services. ",
            ], [
                "name" => "Admin",
                "title" => "Deposit Approval Notification",
                "message" => " Hello Admin  you have approved {$user->name} Deposit Request of \${$current_deposit->amount} through {$current_deposit->method_name} on your $app . Please check it out ;
                ",
            ]);

            session()->flash('success', 'Deposit request Approved Successfully');
        } else {
            session()->flash('success', 'Deposit was already reviewed. No duplicate credit applied.');
        }

        $this->reset('remarks');

        return redirect()->route('admin_editUser', [$user->id])->with('wire:navigate', true);
    }

    public function decline($id)
    {
        $user = $this->user_data;
        $current_deposit = $this->findDeposit((int) $id);

        if (! $current_deposit) {
            session()->flash('error', 'Deposit not found for this user.');
            return redirect()->route('admin_editUser', [$user->id])->with('wire:navigate', true);
        }

        $this->validateOnlyRemark((int) $id);
        $remark = trim((string) ($this->remarks[$id] ?? ''));

        $rejected = DB::transaction(function () use ($current_deposit, $remark) {
            $fresh = Deposit::whereKey($current_deposit->id)->lockForUpdate()->firstOrFail();

            if ((int) $fresh->status !== Deposit::STATUS_PENDING) {
                return false;
            }

            $fresh->update(['status' => Deposit::STATUS_REJECTED, 'admin_remark' => $remark ?: null]);

            return true;
        });

        $current_deposit->refresh();

        if ($rejected) {
            $app = config('app.name');
            $this->mailUser($user->email, 'Deposit Denied Notification', [
                "name" => $user->name,
                "title" => "Deposit Denied Notification",
                "message" => "We have regretfully Denied your deposit request of \${$current_deposit->amount} through {$current_deposit->method_name}, Your account will not be credited."
                    .($remark ? '<br><br>Reason: '.e($remark) : '')
                    .'<br><br>Thanks For Trusting Our Services. ',
            ], [
                "name" => "Admin",
                "title" => "Deposit Denied Notification",
                "message" => " Hello Admin  you have Denied {$user->name} Deposit Request of \${$current_deposit->amount} through {$current_deposit->method_name} on your $app . Please check it out ;
                ",
            ]);

            session()->flash('success', 'Deposit request Denied Successfully');
        } else {
            session()->flash('success', 'Deposit was already reviewed.');
        }

        $this->reset('remarks');

        return redirect()->route('admin_editUser', [$user->id])->with('wire:navigate', true);
    }

    public function withdrawal_approve($id)
    {
        $user = $this->user_data;
        $current_withdrawal = $this->findWithdrawal((int) $id);

        if (! $current_withdrawal) {
            session()->flash('error', 'Withdrawal not found for this user.');
            return redirect()->route('admin_editUser', [$user->id])->with('wire:navigate', true);
        }

        // Balance was already deducted at request time: approval only flips status.
        $approved = DB::transaction(function () use ($current_withdrawal) {
            $fresh = withdrawal::whereKey($current_withdrawal->id)->lockForUpdate()->firstOrFail();

            if ((int) $fresh->status !== withdrawal::STATUS_PENDING) {
                return false;
            }

            $fresh->update(['status' => withdrawal::STATUS_APPROVED]);

            return true;
        });

        $current_withdrawal->refresh();

        if ($approved) {
            $app = config('app.name');
            $methodName = $current_withdrawal->paymentMethod->name ?? $current_withdrawal->bank_name;
            $this->mailUser($user->email, 'Withdrawal Approval Notification', [
                "name" => $user->name,
                "title" => "Withdrawal Approval Notification",
                "message" => "We have successfully approved your Withdrawal request of \${$current_withdrawal->amount} through $methodName, Your account will be credited.
                <br>
                <br>
                Thanks For Trusting Our Services. ",
            ], [
                "name" => "Admin",
                "title" => "Withdrawal Approval Notification",
                "message" => " Hello Admin  you have approved {$user->name} Withdrawal Request of \${$current_withdrawal->amount} through $methodName on your $app . Please check it out ;
                ",
            ]);

            session()->flash('success', 'Withdrawal request Approved Successfully');
        } else {
            session()->flash('success', 'Withdrawal was already reviewed.');
        }

        $this->reset('remarks');

        return redirect()->route('admin_editUser', [$user->id])->with('wire:navigate', true);
    }

    public function withdrawal_decline($id)
    {
        $user = $this->user_data;
        $current_withdrawal = $this->findWithdrawal((int) $id);

        if (! $current_withdrawal) {
            session()->flash('error', 'Withdrawal not found for this user.');
            return redirect()->route('admin_editUser', [$user->id])->with('wire:navigate', true);
        }

        $this->validateOnlyRemark((int) $id);
        $remark = trim((string) ($this->remarks[$id] ?? ''));

        // Refund exactly once, inside a DB transaction.
        $refunded = DB::transaction(function () use ($current_withdrawal, $remark) {
            $fresh = withdrawal::whereKey($current_withdrawal->id)->lockForUpdate()->firstOrFail();

            if ((int) $fresh->status !== withdrawal::STATUS_PENDING) {
                return false;
            }

            $fresh->update(['status' => withdrawal::STATUS_REJECTED, 'admin_remark' => $remark ?: null]);
            User::whereKey($fresh->user_id)->lockForUpdate()->increment('account_bal', $fresh->amount);

            return true;
        });

        $current_withdrawal->refresh();

        if ($refunded) {
            $app = config('app.name');
            $methodName = $current_withdrawal->paymentMethod->name ?? $current_withdrawal->bank_name;
            $this->mailUser($user->email, 'Withdrawal Denied Notification', [
                "name" => $user->name,
                "title" => "Withdrawal Denied Notification",
                "message" => "We have regretfully Denied your Withdrawal request of \${$current_withdrawal->amount} through $methodName. The amount has been refunded to your balance."
                    .($remark ? '<br><br>Reason: '.e($remark) : '')
                    .'<br><br>Thanks For Trusting Our Services. ',
            ], [
                "name" => "Admin",
                "title" => "Withdrawal Denied Notification",
                "message" => " Hello Admin  you have Denied {$user->name} Withdrawal Request of \${$current_withdrawal->amount} through $methodName on your $app . Please check it out ;
                ",
            ]);

            session()->flash('success', 'Withdrawal request Denied Successfully');
        } else {
            session()->flash('success', 'Withdrawal was already reviewed. No duplicate refund applied.');
        }

        $this->reset('remarks');

        return redirect()->route('admin_editUser', [$user->id])->with('wire:navigate', true);
    }

    protected function validateOnlyRemark(int $id): void
    {
        $this->validate(['remarks.'.$id => ['nullable', 'string', 'max:1000']]);
    }

    public function render()
    {
        $user = $this->user_data;

        $deposits = $user->deposits()->with('paymentMethod')->orderByRaw('status = 1 desc, created_at desc')->get();
        $withdrawals = $user->withdrawals()->with('paymentMethod')->orderByRaw('status = 1 desc, created_at desc')->get();

        return view('livewire.admin.transactions', [
            'deposits' => $deposits,
            'withdrawals' => $withdrawals,
        ]);
    }
}
