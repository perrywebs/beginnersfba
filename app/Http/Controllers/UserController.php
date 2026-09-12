<?php

namespace App\Http\Controllers;

use App\Models\UserDocument;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Get first sale date for the user
        $firstSale = DB::table('add_products')
            ->where('user_id', $user->id)
            ->where('soldInStock', 2)
            ->where('status', 2)
            ->orderBy('updated_at', 'asc')
            ->value('updated_at');

        $salesData = [];
        $weekLabels = [];

        if ($firstSale) {
            $firstSaleDate = Carbon::parse($firstSale)->startOfWeek();
            $currentDate = Carbon::now()->endOfWeek();

            // Fetch weekly sales data
            $weeklySales = DB::table('add_products')
                ->select(
                    DB::raw('YEARWEEK(updated_at, 1) as week'), // ISO week format
                    DB::raw('SUM(price * productQuantity) as total_sales')
                )
                ->where('user_id', $user->id)
                ->where('soldInStock', 2)
                ->where('status', 2)
                ->whereBetween('updated_at', [$firstSaleDate, $currentDate])
                ->groupBy('week')
                ->get();

            // Prepare chart data (limit to last 5 weeks dynamically)
            $weeklyData = collect($weeklySales)->map(function ($sale) {
                if (! is_object($sale) || empty($sale->week)) {
                    return null; // Skip invalid data
                }

                $weekString = (string) $sale->week;

                if (strlen($weekString) < 6) {
                    return null; // Ensure correct format
                }

                $year = substr($weekString, 0, 4);
                $weekNumber = substr($weekString, 4, 2);

                return [
                    'week' => Carbon::now()->setISODate((int) $year, (int) $weekNumber)->startOfWeek()->format('M d'),
                    'sales' => (float) $sale->total_sales,
                ];
            })->filter()->slice(-5); // Remove nulls and limit to last 5 weeks

            foreach ($weeklyData as $data) {
                $weekLabels[] = $data['week'];
                $salesData[] = $data['sales'];
            }
        }

        return view('users.index', [
            'salesData' => $salesData,
            'weekLabels' => $weekLabels,
            'countrySvg' => str_replace(' ', '', $user->country),
        ]);
    }

    public function pin()
    {
        return view('users.pin');
    }

    /**
     * Display profile settings page.
     */
    public function profile()
    {
        $user = Auth::user()->load('document');

        return view('users.profile-settings', compact('user'));
    }

    /**
     * Section 1: Update Name & Email
     */
    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,'.$user->id,
        ]);

        $user->update($request->only('name', 'email'));

        return redirect()->back()->with('success', 'Profile updated successfully.');
    }

    /**
     * Section 2: Update Password
     */
    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required|current_password',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = Auth::user();
        $user->update([
            'password' => Hash::make($request->password),
        ]);

        return redirect()->back()->with('success', 'Password updated successfully.');
    }

    /**
     * Section 3: Upload ID Documents
     */
    public function uploadDocuments(Request $request)
    {
        $request->validate([
            'id_front' => 'required|file|mimes:jpeg,jpg,png,pdf|max:5120',
            'id_back' => 'required|file|mimes:jpeg,jpg,png,pdf|max:5120',
        ]);

        $user = Auth::user();

        // Store files in 'storage/app/public/documents'
        $frontPath = $request->file('id_front')->store('documents', 'public');
        $backPath = $request->file('id_back')->store('documents', 'public');

        // Delete old files if document already exists
        if ($user->document) {
            Storage::disk('public')->delete([$user->document->front_path, $user->document->back_path]);
        }

        // Update or Create document record
        UserDocument::updateOrCreate(
            ['user_id' => $user->id],
            [
                'front_path' => $frontPath,
                'back_path' => $backPath,
                'status' => 'pending',
            ]
        );

        return redirect()->back()->with('success', 'ID documents submitted successfully for verification.');
    }
}
