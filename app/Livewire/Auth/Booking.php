<?php

namespace App\Livewire\Auth;

use App\Jobs\SendMail;
use App\Models\Booking as Bookings;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Booking extends Component
{
    public $name;

    public $email;

    public $phone;

    public $password;

    public $password_confirmation;

    public $country;

    public $watch_training_before_applying;

    public $budget_to_invest;

    public $struggle_growing_business;

    public $experience_selling_on_amazon;

    public $how_soon_will_you_start;

    public $promise;

    public function save()
    {
        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255', 'min:3'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.Bookings::class],
            'phone' => ['required', 'min:8', 'max:13', 'unique:'.Bookings::class],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'password_confirmation' => ['required', 'string', 'min:8'],
            'country' => ['required'],
            'watch_training_before_applying' => ['required'],
            'budget_to_invest' => ['required'],
            'struggle_growing_business' => ['required', 'max:2000'],
            'experience_selling_on_amazon' => ['required', 'max:2000'],
            'how_soon_will_you_start' => ['required', 'max:200'],
            'promise' => ['required'],
        ]);

        $insert = Bookings::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'country' => $validated['country'],
            'watch_training_before_applying' => $validated['watch_training_before_applying'],
            'budget_to_invest' => $validated['budget_to_invest'],
            'struggle_growing_business' => $validated['struggle_growing_business'],
            'experience_selling_on_amazon' => $validated['experience_selling_on_amazon'],
            'how_soon_will_you_start' => $validated['how_soon_will_you_start'],
            'promise' => $validated['promise'],
        ]);

        if ($insert) {
            // Approve booking automatically
            $password = $validated['password']; // Use user's chosen password

            $insert->update([
                'status' => 2,
            ]);

            User::create([
                'name' => $insert->name,
                'email' => $insert->email,
                'phone' => $insert->phone,
                'country' => $insert->country,
                'account_bal' => 0,
                'number_of_sales' => 0,
                'total_sales' => 0,
                'total_product' => 0,
                'password' => Hash::make($password), // Hash the password
            ]);

            $app = config('app.name');
            $userEmail = $insert->email;
            $name = $insert->name;
            $subject = "$app Booking Confirmation";

            $bodyUser = [
                'name' => $name,
                'title' => 'Booking Confirmation',
                'message' => "

                    Welcome to $app! Your account has been successfully created.<br><br>

                    <strong>Your Login Credentials:</strong><br>
                    Email: {$userEmail}<br>
                    Password: {$password}<br><br>

                    <strong> IMPORTANT: Complete Your KYC Verification </strong><br><br>
                    To comply with regulatory requirements and ensure the security of your account, 
                    <strong>you are required to complete your KYC (Know Your Customer) verification</strong> 
                    as soon as you log in.<br><br>

                    <strong>Steps to complete KYC:</strong><br>
                    1. Log in to your account using the credentials above<br>
                    2. Navigate to your profile/dashboard<br>
                    3. Scroll to 'ID Document Verification'<br>
                    4. Upload your official government-issued identification document<br>
                    5. Submit for verification<br><br>

                    <strong>Your account will have limited functionality until KYC is completed.</strong><br>
                    We take your security seriously, and this process helps us protect your account 
                    and maintain a safe trading environment.<br><br>

                    For any assistance, please contact our support team.<br><br>

                    Thanks for trusting our services.<br>
                    Best regards,<br>
                    The $app Team
                ",
            ];

            $bodyAdmin = [
                'name' => 'Admin',
                'title' => 'New User Registration - KYC Required',
                'message' => "
                <strong>New user registered and automatically approved on $app.</strong><br><br>

                <strong>User Details:</strong><br>
                Name: {$name}<br>
                Email: {$userEmail}<br>
                Phone: {$insert->phone}<br>
                Country: {$insert->country}<br><br>

                <strong>KYC Status: Pending</strong><br>
                Remind user to complete KYC verification immediately.<br><br>

                <strong>Additional Information:</strong><br>
                Budget to Invest: {$insert->budget_to_invest}<br>
                Watch Training Before Applying: {$insert->watch_training_before_applying}<br>
                Experience Selling on Amazon: {$insert->experience_selling_on_amazon}<br><br>

                Please ensure the user completes their KYC verification.
            ",
            ];

            SendMail::dispatch($userEmail, $subject, $bodyUser, $bodyAdmin);

            session()->flash(
                'success',
                'Registration successful. Your account has been created. Please check your email for login credentials and KYC requirements.'
            );

            return redirect('/booking');
        }

        session()->flash('error', 'An error occurred please try again');

        return redirect('/register');
    }

    public function render()
    {
        return view('livewire.auth.booking');
    }
}
