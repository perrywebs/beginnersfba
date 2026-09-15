<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\PaymentMethodController;
use App\Http\Controllers\Admin\TransactionReviewController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\User\RechargeController;
use App\Http\Controllers\UserController;
use App\Models\AddProduct;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $promotedProducts = AddProduct::with('user')
        ->where('is_promoted', true)
        ->where('status', 2)
        ->orderByDesc('updated_at')
        ->limit(12)
        ->get();

    return view('home.index', compact('promotedProducts'));
})->name('home');

// Public product viewing
Route::get('/products/{slug}', [ProductController::class, 'showBySlug'])->name('product.show');
Route::get('/product/{id}', [ProductController::class, 'showById'])->name('product.showById');

Route::get('/readymade-7000-drop-shipping-suppliers-in-usa-download-link', function () {
    return view('home.readymade-7000-drop-shipping-suppliers-in-usa-download-link');
});

Route::get('/how-to-fix-amazon-seller-error-5665-without-brand-registry', function () {
    return view('home.how-to-fix-amazon-seller-error-5665-without-brand-registry');
});

Route::get('/how-to-launch-your-first-product-on-amazon-in-2021', function () {
    return view('home.how-to-launch-your-first-product-on-amazon-in-2021');
});

Route::get('/access', function () {
    return view('auth.login');
})->name('login');

Route::post('/access', [AuthController::class, 'authUser'])->name('post.login');

Route::get('/booking', function () {
    return view('auth.booking');
})->name('register');

// users Route
Route::prefix('users')->group(function () {
    Route::middleware('auth')->group(function () {

        // all user-auth route goes here
        Route::get('/', [UserController::class, 'index'])->name('dashboard');

        Route::get('/add-product', function () {
            $user_data = Auth::user();

            $user = User::findOrFail($user_data->id);

            $add_products = $user->addproducts()->orderByRaw('created_at desc')->get();

            return view('users.add-product', [
                'add_products' => $add_products,
            ]);
        })->name('add_product');

        Route::get('/affiliate-marketing', function () {
            return view('users.affiliate_marketing');
        })->name('affiliate_marketing');

        Route::get('/catalog', function () {
            $user_data = Auth::user();

            $user = User::findOrFail($user_data->id);

            $add_products = $user->addproducts()->where('status', 2)->orderByRaw('created_at desc')->Paginate(3);

            return view('users.catalog', [
                'catalogs' => $add_products,
            ]);
        })->name('catalog');

        Route::get('/giftcard', function () {

            if (! session()->has('amount')) {
                return redirect()->route('dashboard');
            }

            return view('users.giftcard');
        })->name('giftcard');

        Route::get('/transaction-history', function () {

            $user = Auth::user();
            $user = User::findOrFail($user->id);

            $deposits = $user->deposits()->orderByRaw('status = 1 desc, created_at desc')->get();

            return view('users.transaction-history', [
                'deposits' => $deposits,
            ]);
        })->name('transaction_history');

        Route::get('/withdrawal', function () {

            $user = Auth::user();
            $user = User::findOrFail($user->id);

            $withdrawals = $user->withdrawals()->orderByRaw('status = 1 desc, created_at desc')->get();

            return view('users.withdrawal', [
                'withdrawals' => $withdrawals,
            ]);
        })->name('withdrawal');

        Route::get('/pin', [UserController::class, 'pin'])->name('pin');

        // Recharge (deposit) — dedicated pages, database-driven payment methods
        Route::get('/recharge', [RechargeController::class, 'index'])->name('recharge.index');
        Route::get('/recharge/{paymentMethod}', [RechargeController::class, 'show'])->name('recharge.show');
        Route::post('/recharge/{paymentMethod}', [RechargeController::class, 'store'])->name('recharge.store');

        // View profile
        Route::get('/profile', [UserController::class, 'profile'])->name('user.profile');

        // Form handlers
        Route::put('/profile/update', [UserController::class, 'updateProfile'])->name('user.profile.update');
        Route::put('/profile/password', [UserController::class, 'updatePassword'])->name('user.password.update');
        Route::post('/profile/documents', [UserController::class, 'uploadDocuments'])->name('user.documents.upload');
    });
});

// Admin Routes
Route::prefix('admin')->group(function () {
    Route::middleware(['auth', 'admin'])->group(function () {

        Route::get('/', [AdminController::class, 'admin'])->name('admin_dashboard');
        Route::get('/edit-user/{user}', [AdminController::class, 'editUser'])->name('admin_editUser');
        Route::get('/edit-user/{user}/{addproduct}', [AdminController::class, 'viewProducts'])->name('admin_viewproducts');
        Route::get('/bookings', [AdminController::class, 'bookings'])->name('admin_bookings');
        Route::get('/bookings/{booking}', [AdminController::class, 'bookings_view'])->name('admin_bookings_view');
        Route::get('/admin-wallet', [AdminController::class, 'admin_wallet'])->name('admin_wallet');

        // Payment method management (database-driven, extensible)
        Route::get('/payment-methods', [PaymentMethodController::class, 'index'])->name('admin_payment_methods.index');
        Route::get('/payment-methods/create', [PaymentMethodController::class, 'create'])->name('admin_payment_methods.create');
        Route::post('/payment-methods', [PaymentMethodController::class, 'store'])->name('admin_payment_methods.store');
        Route::get('/payment-methods/{paymentMethod}/edit', [PaymentMethodController::class, 'edit'])->name('admin_payment_methods.edit');
        Route::put('/payment-methods/{paymentMethod}', [PaymentMethodController::class, 'update'])->name('admin_payment_methods.update');
        Route::delete('/payment-methods/{paymentMethod}', [PaymentMethodController::class, 'destroy'])->name('admin_payment_methods.destroy');
        Route::post('/payment-methods/{paymentMethod}/toggle', [PaymentMethodController::class, 'toggle'])->name('admin_payment_methods.toggle');

        // Global recharge / withdrawal review
        Route::get('/deposits', [TransactionReviewController::class, 'deposits'])->name('admin_deposits.index');
        Route::get('/deposits/{deposit}', [TransactionReviewController::class, 'showDeposit'])->name('admin_deposits.show');
        Route::post('/deposits/{deposit}/approve', [TransactionReviewController::class, 'approveDeposit'])->name('admin_deposits.approve');
        Route::post('/deposits/{deposit}/reject', [TransactionReviewController::class, 'rejectDeposit'])->name('admin_deposits.reject');
        Route::get('/withdrawals', [TransactionReviewController::class, 'withdrawals'])->name('admin_withdrawals.index');
        Route::get('/withdrawals/{withdrawal}', [TransactionReviewController::class, 'showWithdrawal'])->name('admin_withdrawals.show');
        Route::post('/withdrawals/{withdrawal}/approve', [TransactionReviewController::class, 'approveWithdrawal'])->name('admin_withdrawals.approve');
        Route::post('/withdrawals/{withdrawal}/reject', [TransactionReviewController::class, 'rejectWithdrawal'])->name('admin_withdrawals.reject');
    });
});
