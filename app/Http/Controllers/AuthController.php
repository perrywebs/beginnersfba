<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function authUser(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
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
}
