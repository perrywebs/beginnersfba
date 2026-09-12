<?php

namespace App\Livewire\Admin;

use App\Models\User;
use App\Jobs\SendMail;
use App\Models\Deposit;
use App\Models\withdrawal;
use Livewire\Component;

class Transactions extends Component
{
    public $user_data;

    public function approve($id)
    {
        $user = $this->user_data;
        $current_deposit = Deposit::where("id","$id")->where("user_id"," $user->id")->get()->first();

        $result = Deposit::where("id","$id")->update([
            "status" => 2,
        ]);

        if ($result) {

            $new_balance = $user->account_bal + $current_deposit->amount ;
            User::where("id","$user->id")->update([
                "account_bal" => $new_balance,
            ]);

            $app = config('app.name');
            $userEmail = $user->email;

            $name = $user->name;
            $subject = "Deposit Approval Notification";


            $bodyUser = [
                "name" => $name,
                "title" => "Deposit Approval Notification",
                "message" => "We have successfully approved your deposit request of $$current_deposit->amount through $current_deposit->payment_method, Your account have been credited.
                <br>
                <br>
                Thanks For Trusting Our Services. ",
            ];
            $bodyAdmin = [
                "name" => "Admin",
                "title" => "Deposit Approval Notification",
                "message" => " Hello Admin  you have approved $name Deposit Request of $$current_deposit->amount through $current_deposit->payment_method on your $app . Please check it out ;
                ",
            ];

            SendMail::dispatch($userEmail,$subject, $bodyUser ,$bodyAdmin);

            session()->flash('success', 'Deposit request Approved Successfully');
            
            $this->reset();

            return redirect()->route('admin_editUser',[$user->id])->with('wire:navigate', true);
        }

        session()->flash('error', 'An error occurred please try again');
        return redirect()->route('admin_editUser',[$user->id])->with('wire:navigate', true);
    }

    public function decline($id)
    {
        $user = $this->user_data;
        $current_deposit = Deposit::where("id","$id")->where("user_id"," $user->id")->get()->first();

        $result = Deposit::where("id","$id")->update([
            "status" => 3,
        ]);

        if ($result) {

            $app = config('app.name');
            $userEmail = $user->email;

            $name = $user->name;
            $subject = "Deposit Denied Notification";


            $bodyUser = [
                "name" => $name,
                "title" => "Deposit Denied Notification",
                "message" => "We have regretfully Denied your deposit request of $$current_deposit->amount through $current_deposit->payment_method, Your account will not be credited.
                <br>
                <br>
                Thanks For Trusting Our Services. ",
            ];
            $bodyAdmin = [
                "name" => "Admin",
                "title" => "Deposit Denied Notification",
                "message" => " Hello Admin  you have Denied $name Deposit Request of $$current_deposit->amount through $current_deposit->payment_method on your $app . Please check it out ;
                ",
            ];

            SendMail::dispatch($userEmail,$subject, $bodyUser ,$bodyAdmin);

            session()->flash('success', 'Deposit request Denied Successfully');
            
            $this->reset();

            return redirect()->route('admin_editUser',[$user->id])->with('wire:navigate', true);
        }

        session()->flash('error', 'An error occurred please try again');
        return redirect()->route('admin_editUser',[$user->id])->with('wire:navigate', true);
    }

    
    public function withdrawal_approve($id)
    {
        $user = $this->user_data;
        $current_withdrawal = withdrawal::where("id","$id")->where("user_id"," $user->id")->get()->first();

        $result = withdrawal::where("id","$id")->update([
            "status" => 2,
        ]);

        if ($result) {

            $app = config('app.name');
            $userEmail = $user->email;

            $name = $user->name;
            $subject = "Withdrawal Approval Notification";


            $bodyUser = [
                "name" => $name,
                "title" => "Withdrawal Approval Notification",
                "message" => "We have successfully approved your Withdrawal request of $$current_withdrawal->amount through $current_withdrawal->bank_name, Your account will be credited.
                <br>
                <br>
                Thanks For Trusting Our Services. ",
            ];
            $bodyAdmin = [
                "name" => "Admin",
                "title" => "Withdrawal Approval Notification",
                "message" => " Hello Admin  you have approved $name Withdrawal Request of $$current_withdrawal->amount through $current_withdrawal->bank_name on your $app . Please check it out ;
                ",
            ];

            SendMail::dispatch($userEmail,$subject, $bodyUser ,$bodyAdmin);

            session()->flash('success', 'Withdrawal request Approved Successfully');
            
            $this->reset();

            return redirect()->route('admin_editUser',[$user->id])->with('wire:navigate', true);
        }

        session()->flash('error', 'An error occurred please try again');
        return redirect()->route('admin_editUser',[$user->id])->with('wire:navigate', true);
    }
    
    public function withdrawal_decline($id)
    {
        $user = $this->user_data;
        $current_withdrawal = withdrawal::where("id","$id")->where("user_id"," $user->id")->get()->first();

        $result = withdrawal::where("id","$id")->update([
            "status" => 3,
        ]);

        if ($result) {

            $new_balance = $user->account_bal + $current_withdrawal->amount ;
            User::where("id","$user->id")->update([
                "account_bal" => $new_balance,
            ]);

            $app = config('app.name');
            $userEmail = $user->email;

            $name = $user->name;
            $subject = "Withdrawal Denied Notification";


            $bodyUser = [
                "name" => $name,
                "title" => "Withdrawal Denied Notification",
                "message" => "We have regretfully Denied your Withdrawal request of $$current_withdrawal->amount through $current_withdrawal->bank_name, Your account will not be credited.
                <br>
                <br>
                Thanks For Trusting Our Services. ",
            ];
            $bodyAdmin = [
                "name" => "Admin",
                "title" => "Withdrawal Denied Notification",
                "message" => " Hello Admin  you have Denied $name Withdrawal Request of $$current_withdrawal->amount through $current_withdrawal->bank_name on your $app . Please check it out ;
                ",
            ];

            SendMail::dispatch($userEmail,$subject, $bodyUser ,$bodyAdmin);

            session()->flash('success', 'Withdrawal request Denied Successfully');
            
            $this->reset();

            return redirect()->route('admin_editUser',[$user->id])->with('wire:navigate', true);
        }

        session()->flash('error', 'An error occurred please try again');
        return redirect()->route('admin_editUser',[$user->id])->with('wire:navigate', true);
    }

    public function render()
    {
        $user = $this->user_data;

        $deposits = $user->deposits()->orderByRaw('status = 1 desc, created_at desc')->get();
        $withdrawals = $user->withdrawals()->orderByRaw('status = 1 desc, created_at desc')->get();
        
        return view('livewire.admin.transactions',[
            'deposits' => $deposits, 
            'withdrawals' => $withdrawals,
        ]);
    }
}
