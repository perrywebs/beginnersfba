<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class Login extends Component
{
    public $email;
    public $password;

    public function login()
    {
        // Validate input
        $validatedData = $this->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]);

        // Attempt login
        if (!Auth::attempt($validatedData)) {
            session()->flash('error', 'Invalid login details. Please try again.');
            return redirect()->back();
        }

        // Regenerate session
        Session::regenerate();

        // Determine user role and redirect
        $user = Auth::user();
        $route = ($user->role == 2) ? 'admin_dashboard' : 'dashboard';

        return redirect()->route($route);
    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}

 