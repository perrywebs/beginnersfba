<?php

namespace App\Livewire\Admin;

use App\Models\User;
use App\Jobs\SendMail;
use App\Models\Booking;
use Livewire\Component;
use Illuminate\Support\Str;

class ViewBookings extends Component
{
    public $bookings;

    public $email;

    public function mount($bookings)
    {
        $currentBooking = Booking::where("id","$bookings->id")->get()->first();
        $this->email = $currentBooking->email;
    }

    public function approve($id)
    {
        $booking_data = Booking::where("id","$id")->get()->first();

        if ($booking_data->status == 2) {
            session()->flash('error', 'This Booking have been approved already');
            return redirect()->route('admin_bookings_view',[$id])->with('wire:navigate', true);
        }

        if ($booking_data) {
            Booking::where("id","$id")->update([
                "status" => 2,
                "email" => $this->email ?? $booking_data->email,
            ]);

            $password = Str::random(10);

            $result = User::create([
                "name" => $booking_data->name,
                "email" => $this->email ?? $booking_data->email,
                "phone" => $booking_data->phone,
                "country" => $booking_data->country,
                "account_bal" => 0,
                "number_of_sales" => 0,
                "total_sales" => 0,
                "total_product" => 0,
                "password" => $password,
            ]);

            if ($result) {
    
                $app = config('app.name');
                $userEmail = $this->email ?? $booking_data->email;
    
                $name = $booking_data->name;
                $subject = "FbaBeginners Booking Approval";
 
    
                $bodyUser = [
                    "name" => $name,
                    "title" => "Booking Approval",
                    "message" => "Hi there, thanks for signing up with us. Log on to your account using the below info.
                    <br>
                    <br>
                    Email: $userEmail <br>
                    Password: $password <br>
                    <br>
                    Thanks For Trusting Our Services. ",
                ];
                $bodyAdmin = [
                    "name" => "Admin",
                    "title" => "Booking Approval",
                    "message" => " Hello Admin  you have accepted $booking_data->name booking request on your $app . His login details have been mailed to him/her automatically ;
                    <br>
                    Below are the details
                    <br>
                    <br>
                    Email: $userEmail <br>
                    Password: $password <br>
                    ",
                ];
    
                SendMail::dispatch($userEmail,$subject, $bodyUser ,$bodyAdmin);
    
                session()->flash('success', 'Booking request Approved Successfully');
                
                $this->reset();
    
                return redirect()->route('admin_bookings')->with('wire:navigate', true);
            }

            session()->flash('error', 'An error occurred please try again');
            return redirect()->route('admin_bookings_view',[$id])->with('wire:navigate', true);
        }

        session()->flash('error', 'An error occurred please try again');
        return redirect()->route('admin_bookings_view',[$id])->with('wire:navigate', true);
    }

    public function decline($id)
    {
        $booking_data = Booking::where("id","$id")->get()->first();

        if ($booking_data->status == 3) {
            session()->flash('error', 'This Booking have been declined already');
            return redirect()->route('admin_bookings_view',[$id])->with('wire:navigate', true);
        }

        if ($booking_data) {

            $result = Booking::where("id","$id")->update([
                "status" => 3,
            ]);

            if ($result) {
    
                $app = config('app.name');
                $userEmail = $this->email ?? $booking_data->email;
    
                $name = $booking_data->name;
                $subject = "Beginnersfba Booking Denied";
 
    
                $bodyUser = [
                    "name" => $name,
                    "title" => "Booking Denied",
                    "message" => "Hi there, thanks for booking with us with us. We are sorry to inform you that your booking was rejected. contact our team for more information.  
                    <br>
                    Thanks For Trusting Our Services. ",
                ];
                $bodyAdmin = [
                    "name" => "Admin",
                    "title" => "Booking Denied",
                    "message" => " Hello Admin  you have Denied $booking_data->name booking request on your $app .
                    ",
                ];
    
                SendMail::dispatch($userEmail,$subject, $bodyUser ,$bodyAdmin);
    
                session()->flash('success', 'Booking request Denied Successfully');
                
                $this->reset();
    
                return redirect()->route('admin_bookings')->with('wire:navigate', true);
            }

            session()->flash('error', 'An error occurred please try again');
            return redirect()->route('admin_bookings_view',[$id])->with('wire:navigate', true);

        }
        
        session()->flash('error', 'An error occurred please try again');
        return redirect()->route('admin_bookings_view',[$id])->with('wire:navigate', true);
    }

    public function render()
    {
        $bookings = $this->bookings;

        return view('livewire.admin.view-bookings',[
            "bookings" => $bookings,
        ]);
    }
}
