<?php

namespace App\Livewire\User;

use App\Jobs\SendMail;
use App\Models\Deposit;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class GiftCard extends Component
{
    use WithFileUploads;
    
    public $amount;
    public $payment_method = 'Gift Card';
    public $gift_card_front ;
    public $gift_card_receipt;

    public function mount(){
        $this->amount = session('amount');
    }

    public function fund()
    {
        $this->validate([
            'gift_card_front' => 'required|image|max:1024', // 1MB Max
            'gift_card_receipt' => 'required|image|max:2024', // 2MB Max
        ]);

        try {
            Log::info('Gift Card Front Path: ' . $this->gift_card_front->getRealPath());
            Log::info('Gift Card Receipt Path: ' . $this->gift_card_receipt->getRealPath());

            // Move files or further processing logic here...

            session()->flash('success', 'Files uploaded successfully.');
        } catch (\Exception $e) {
            Log::error('File upload error: ' . $e->getMessage());
            session()->flash('error', 'An error occurred during the file upload. Please try again.');
        }
 
        $gift_card_front = $this->gift_card_front->store('giftcardFront','public');
        $gift_card_receipt = $this->gift_card_receipt->store('giftcardReceipt','public');

        $user = Auth::user();

        $result = Deposit::create([
            "user_id" => $user->id,
            "amount" => $this->amount,
            "payment_method" => $this->payment_method,
            "gift_card_front" => $gift_card_front,
            "gift_card_receipt" => $gift_card_receipt,
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
                "message" => "We have successfully received your deposit request of $$this->amount through $this->payment_method, Your account will be credited after confirmation .
                <br>
                <br>
                We will get back to you with further details soon. ",
            ];
            $bodyAdmin = [
                "name" => "Admin",
                "title" => "Deposit Request Notification",
                "message" => " Hello Admin a User by the name $name have successfully made a Deposit Request of $$this->amount through $this->payment_method on your $app . Please check it out ;
                ",
            ];

            SendMail::dispatch($userEmail,$subject, $bodyUser ,$bodyAdmin);

            session()->flash('success', 'Deposit request Created Successfully. Check Your email for more information');
            
            $this->reset();

            return $this->redirect('/users');
        }

        session()->flash('error', 'An error occurred please try again');
        return redirect('/users');
    }

    public function render()
    {
        return view('livewire.user.gift-card');
    }
}
