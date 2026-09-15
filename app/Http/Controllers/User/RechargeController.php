<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Jobs\SendMail;
use App\Models\Deposit;
use App\Models\PaymentMethod;
use App\Services\PaymentMethodService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RechargeController extends Controller
{
    /** GET /users/recharge — select an active payment method. */
    public function index(Request $request)
    {
        $query = PaymentMethod::forDeposit();

        if ($request->filled('type') && array_key_exists($request->string('type')->toString(), PaymentMethod::TYPES)) {
            $query->where('type', $request->string('type')->toString());
        }

        if ($request->filled('search')) {
            $query->where('name', 'like', '%'.$request->string('search')->toString().'%');
        }

        return view('users.recharge.index', [
            'methods' => $query->get(),
            'types' => PaymentMethod::TYPES,
            'filters' => $request->only(['type', 'search']),
        ]);
    }

    /** GET /users/recharge/{paymentMethod} — amount + dynamic fields + proof. */
    public function show(PaymentMethod $paymentMethod)
    {
        abort_unless($paymentMethod->is_active && $paymentMethod->deposit_enabled, 404);

        return view('users.recharge.show', [
            'method' => $paymentMethod->load('fields'),
            'fields' => $paymentMethod->fieldsFor('deposit'),
        ]);
    }

    /** POST /users/recharge/{paymentMethod} */
    public function store(Request $request, PaymentMethod $paymentMethod)
    {
        abort_unless($paymentMethod->is_active && $paymentMethod->deposit_enabled, 403, 'This payment method is not available.');

        $min = $paymentMethod->min_deposit !== null ? (float) $paymentMethod->min_deposit : 1;
        $amountRules = ['required', 'numeric', 'min:'.$min];
        $max = $paymentMethod->max_deposit !== null ? (float) $paymentMethod->max_deposit : null;
        if ($max !== null) {
            $amountRules[] = 'max:'.$max;
        }

        $built = PaymentMethodService::fieldRules($paymentMethod, 'deposit', 'fields');

        $request->validate(array_merge([
            'amount' => $amountRules,
            'proof' => ['required', 'file', 'mimes:jpeg,jpg,png,webp,pdf', 'max:5120'],
        ], $built['rules']), array_merge([
            'amount.min' => 'The minimum recharge for '.$paymentMethod->name.' is $'.number_format($min, 2).'.',
            'amount.max' => 'The maximum recharge for '.$paymentMethod->name.' is $'.number_format((float) $max, 2).'.',
        ], $built['messages']));

        $details = PaymentMethodService::sanitizeDetails($paymentMethod, 'deposit', (array) $request->input('fields', []));
        $snapshot = PaymentMethodService::snapshot($paymentMethod, 'deposit');

        $proofPath = $request->file('proof')->store('deposits', 'public');

        $deposit = DB::transaction(function () use ($request, $paymentMethod, $details, $snapshot, $proofPath) {
            $user = Auth::user();

            return Deposit::create([
                'user_id' => $user->id,
                'payment_method_id' => $paymentMethod->id,
                'reference' => PaymentMethodService::generateReference('RCH'),
                'amount' => $request->input('amount'),
                'payment_method' => $paymentMethod->name,
                'proof_image' => $proofPath,
                'method_snapshot' => $snapshot,
                'details' => $details,
                'status' => Deposit::STATUS_PENDING,
            ]);
        });

        $user = Auth::user();
        SendMail::dispatch($user->email, 'Deposit Request Notification', [
            'name' => $user->name,
            'title' => 'Deposit Request Notification',
            'message' => "We received your recharge request of \${$deposit->amount} via {$paymentMethod->name} (Ref: {$deposit->reference}).<br><br>Your account will be credited after confirmation.",
        ], [
            'name' => 'Admin',
            'title' => 'Deposit Request Notification',
            'message' => "User {$user->name} submitted a recharge of \${$deposit->amount} via {$paymentMethod->name} (Ref: {$deposit->reference}). Please review the proof of payment.",
        ]);

        return redirect()->route('transaction_history')->with('success', 'Recharge request submitted successfully (Ref: '.$deposit->reference.').');
    }
}
