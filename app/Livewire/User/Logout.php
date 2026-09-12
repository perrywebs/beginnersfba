<?php

namespace App\Livewire\User;

use Livewire\Component;
use Illuminate\Support\Facades\Session;

class Logout extends Component
{
    // logout function
    public function logout()
    {
        Session::invalidate();
        Session::regenerateToken();

        return redirect('/access');
    }
    
    public function render()
    {
        return view('livewire.user.logout');
    }
}
