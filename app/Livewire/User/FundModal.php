<?php

namespace App\Livewire\User;

use App\Jobs\SendMail;
use App\Models\Deposit;
use Livewire\Component;
use App\Models\AdminWallet;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;

class FundModal extends Component
{
    use WithFileUploads;

    public $amount;
    protected $rules = [
        'amount' => ['required', 'numeric', 'min:100'],
    ];

    public $proof;
    protected $profRules = [
        'amount' => ['required', 'numeric', 'min:100'],
        'payment_method' => ['required'],
        'proof' => ['required', 'image', 'max:2048'], // 2MB
    ];


    public $payment_method;

    public $copyAddress;

    public $admin_wallets;

    public function mount(AdminWallet $admin_wallet)
    {
        $this->admin_wallets = (object) $admin_wallet->get()->first();
    }

    // to choose if copy address will show
    public $display = "d-none";

    public function updated($amount)
    {
        $this->validateOnly($amount);

        if ($this->payment_method == "Bitcoin") {
            $this->copyAddress = $this->admin_wallets->bitcoin ?? "wallet address not available. Contact us ";
            return $this->display = "";
        } elseif ($this->payment_method == "USDT") {
            $this->copyAddress = $this->admin_wallets->usdt ?? "wallet address not available. Contact us ";
            return $this->display = "";
        } elseif ($this->payment_method == "PayPal") {
            $this->copyAddress = $this->admin_wallets->pay_pal ?? "wallet address not available. Contact us ";
            return $this->display = "";
        } elseif ($this->payment_method == "Cash App") {
            $this->copyAddress = $this->admin_wallets->cash_app ?? "wallet address not available. Contact us ";
            return $this->display = "";
        } elseif ($this->payment_method == "Ethereum") {
            $this->copyAddress = $this->admin_wallets->ethereum ?? "wallet address not available. Contact us ";
            return $this->display = "";
        } elseif ($this->payment_method == "MoneyGram") {
            $this->copyAddress = $this->admin_wallets->money_gram ?? "wallet address not available. Contact us ";
            return $this->display = "";
        } elseif ($this->payment_method == "WesternUnion") {
            $this->copyAddress = $this->admin_wallets->western_union ?? "wallet address not available. Contact us ";
            return $this->display = "";
        } elseif ($this->payment_method == "GiftCard") {
            return $this->display = "d-none";
        }
    }

    public function fund()
    {
        $this->validate();

        if ($this->payment_method == "GiftCard") {
            session(['amount' => $this->amount]);
            return redirect()->route('giftcard')->with('wire:navigate', true);
        }

        // Store Image
        $imageName = time() . '_' . $this->proof->getClientOriginalName();
        $path = $this->proof->storeAs(
            'deposits',
            $imageName,
            'public'
        );

        $user = Auth::user();

        $result = Deposit::create([
            "user_id" => $user->id,
            "amount" => $this->amount,
            "payment_method" => $this->payment_method,
            "proof_image" => $path,
            "status" => 1
        ]);

        if ($result) {

            $app = config('app.name');
            $userEmail = $user->email;
            $name = $user->name;
            $subject = "Deposit Request Notification";

            $bodyUser = [
                "name" => $name,
                "title" => "Deposit Request Notification",
                "message" => "We received your deposit request of $$this->amount via $this->payment_method.
            <br><br>
            Your account will be credited after confirmation.",
            ];

            $bodyAdmin = [
                "name" => "Admin",
                "title" => "Deposit Request Notification",
                "message" => "User $name submitted a deposit request of $$this->amount via $this->payment_method.
            Please review the proof of payment.",
            ];

            SendMail::dispatch($userEmail, $subject, $bodyUser, $bodyAdmin);

            session()->flash('success', 'Deposit request created successfully');

            $this->reset();

            return redirect('/users')->with('wire:navigate', true);
        }

        session()->flash('error', 'Something went wrong');
        return redirect('/users')->with('wire:navigate', true);
    }

    public function render()
    {
        return view('livewire.user.fund-modal');
    }
}
