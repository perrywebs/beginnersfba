<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Booking;
use App\Models\AddProduct;
use App\Models\AdminWallet;
use App\Models\withdrawal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function admin(Request $request, User $users, withdrawal $withdrawal)
    {
        if ($request->method() == "GET") {

            $users_data = $users->where("role", 1)->get();

            $total_users = $users->where("role", 1)->count();

            $total_balance = $users->where("role", 1)->sum("account_bal");

            $total_withdrawal = $withdrawal
            ->where("status", 2)
            ->sum("amount");

            return view('admin.index', [
                "title" => "Admin Dashboard",
                "admin_data" => Auth::user(),
                "total_users" => $total_users,
                "total_balance" => $total_balance,
                "total_withdrawal" => $total_withdrawal,
                "users" => $users_data,
            ]);
        }
    }

    public function editUser(Request $request, User $user)
    {
        if ($request->method() == 'GET') {

            $affiliates = $user->affiliates()->orderByRaw('created_at desc')->get();
            $add_products = $user->addproducts()->orderByRaw('created_at desc')->get();

            return view('admin.editUser',[
                "user" => $user,
                "affiliates" => $affiliates,
                "add_products" => $add_products,
            ]);
        }
    }

    public function viewProducts(Request $request, User $user, AddProduct $addproduct)
    {
        if ($request->method() == 'GET') {
            $photoPaths = json_decode($addproduct->photos, true);
            return view('admin.view_products',[
                "photoPaths" => $photoPaths,
                "user" => $user,
            ]);
        }
    }

    public function bookings(Request $request)
    {
        if ($request->method() == 'GET') {

            $bookings = Booking::orderByRaw('status = 1 desc, created_at desc')->get();
            return view('admin.bookings',[
                "bookings" => $bookings,
            ]);
        }
    }

    public function bookings_view(Request $request, Booking $booking)
    {
        if ($request->method() == 'GET') {

            return view('admin.bookings_view',[
                "bookings" => $booking,
            ]);
        }
    }

    public function admin_wallet(Request $request)
    {
        if ($request->method() == 'GET') {

            $admin_wallets = AdminWallet::get()->first();

            return view('admin.admin_wallet',[
                "admin_wallets" => $admin_wallets,
            ]);
        }
    }
}
