<?php

namespace App\Livewire\User;

use App\Models\User;
use App\Models\withdrawal as Withdraw;
use App\Jobs\SendMail;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Rule;

class Withdrawal extends Component
{
    public $withdrawals;

    public $amount, $account_name, $bank_name, $account_number, $account_type, $address, $swift_bic_code;
    public $tax_code, $imf_code, $cot_code;
    public $step = 1; // Default to step 1
    public $error = "";

    protected $rules = [
        'amount' => ['required', 'numeric', 'min:1000'],
        'account_name' => ['required', 'string', 'max:255'],
        'bank_name' => ['required', 'string', 'max:255'],
        'account_number' => ['required', 'string', 'max:20'],
        'account_type' => ['required', 'string', 'max:20'],
        'address' => ['required', 'string', 'max:255'],
        'swift_bic_code' => ['required', 'string', 'max:50'],
    ];
    
    public function submitWithdrawalDetails()
    {
        $this->validate();
        $this->step = 2; // Move to tax code step
    }

    public function validateTaxCode()
    { 
        if ($this->tax_code != Auth::user()->tax_code) {
            $this->error = "Invalid Tax Code";
            return;
        }
        $this->error = "";
        $this->step = 3; // Move to IMF Code step
    }

    public function validateImfCode()
    {
        if ($this->imf_code != Auth::user()->imf_code) {
            $this->error = "Invalid IMF Code";
            return;
        }
        $this->error = "";
        $this->step = 4; // Move to COT Code step
    }

    public function validateCotCode()
    {
        if ($this->cot_code != Auth::user()->cot_code) {
            $this->error = "Invalid COT Code";
            return;
        }
        $this->error = "";
        $this->processWithdrawal(); // All codes are correct, proceed with withdrawal
        session()->forget('step2'); // Remove 'step2' from Laravel's session
    }

    public function processWithdrawal()
    {
        $user = Auth::user();
        if ($user->account_bal < $this->amount) {
            session()->flash('error', 'Insufficient balance to withdraw');
            return;
        }

        $new_balance = $user->account_bal - $this->amount;
        User::where('id', $user->id)->update(['account_bal' => $new_balance]);

        $result = Withdraw::create([
            'user_id' => $user->id,
            'amount' => $this->amount,
            'account_name' => $this->account_name,
            'bank_name' => $this->bank_name,
            'account_number' => $this->account_number,
            'account_type' => $this->account_type,
            'address' => $this->address,
            'swift_bic_code' => $this->swift_bic_code,
            'status' => 1,
        ]);

        if ($result) {
            $subject = "Withdrawal Request";
            $bodyUser = [
                "name" => $user->name,
                "title" => "Withdrawal Request Notification",
                "message" => "We have successfully received your withdrawal request of $$this->amount. Your account will be credited after confirmation.",
            ];
            $bodyAdmin = [
                "name" => "Admin",
                "title" => "Withdrawal Request Notification",
                "message" => "Hello Admin, a user by the name {$user->name} has made a withdrawal request of $$this->amount.",
            ];

            SendMail::dispatch($user->email, $subject, $bodyUser, $bodyAdmin);

            session()->flash('success', 'Withdrawal Request Created Successfully. Check your email for more information');
            $this->reset();
        } else {
            session()->flash('error', 'An error occurred. Please try again.');
        }
    }

    public function render()
    {
        return view('livewire.user.withdrawal', ['step' => $this->step]);
    }
}
