<?php

namespace App\Livewire\User;

use App\Jobs\SendMail;
use Livewire\Component;
use App\Models\Affiliate;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;

class AffiliateMarketing extends Component
{
    use WithFileUploads;

    #[Validate('required|image|max:1024')]
    public $photo;

    #[Validate('required')]
    public $productLink;

    #[Validate('required')]
    public $productDescription;

    #[Validate('required')]
    public $price;

    #[Validate('required')]
    public $ecommercePlatform;

    public function save()
    {
        $this->validate();
        $user = Auth::user();

        $photoPath = $this->photo->store('affiliate', 'public');

        $result = Affiliate::create([
            "user_id" => $user->id,
            "product_image" => $photoPath,
            "product_link" => $this->productLink,
            "product_description" => $this->productDescription,
            "product_price" => $this->price,
            "ecommerce_platform" => $this->ecommercePlatform,
        ]);

        if ($result) {
            $app = config('app.name');
            $userEmail = $user->email;

            $name = $user->name;
            $subject = "Affiliate Product upload";


            $bodyUser = [
                "name" => $name,
                "title" => "Affiliate Product upload",
                "message" => "We have successfully received your Product upload.
                <br>
                <br>
                We will get back to you with further details soon. ",
            ];
            $bodyAdmin = [
                "name" => "Admin",
                "title" => "Affiliate Product upload",
                "message" => " Hello Admin a User by the name $name have successfully made an affiliate upload on your $app . Please check it out ;
                ",
            ];

            SendMail::dispatch($userEmail, $subject, $bodyUser, $bodyAdmin);

            session()->flash('success', 'Affiliate Product upload Created Successfully. Check Your email for more information');

            $this->reset();

            return redirect('/users/affiliate-marketing')->with('wire:navigate', true);
        }

        session()->flash('error', 'An error occurred please try again');
        return redirect('/users/affiliate-marketing')->with('wire:navigate', true);
    }

    public function render()
    {
        return view('livewire.user.affiliate-marketing');
    }
}
