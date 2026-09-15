<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jobs\SendMail;
use App\Models\Deposit;
use App\Models\User;
use App\Models\withdrawal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransactionReviewController extends Controller
{
    // ---------- DEPOSITS / RECHARGES ----------

    public function deposits(Request $request)
    {
        $query = Deposit::with(['user', 'paymentMethod'])->orderByRaw('status = 1 desc')->orderByDesc('created_at');

        if ($request->filled('status')) {
            $query->where('status', (int) $request->input('status'));
        }
        if ($request->filled('search')) {
            $s = '%'.$request->string('search')->toString().'%';
            $query->where(fn ($q) => $q->where('reference', 'like', $s)
                ->orWhere('payment_method', 'like', $s)
                ->orWhereHas('user', fn ($u) => $u->where('name', 'like', $s)->orWhere('email', 'like', $s)));
        }

        return view('admin.deposits.index', [
            'deposits' => $query->paginate(20)->withQueryString(),
            'filters' => $request->only(['status', 'search']),
        ]);
    }

    public function showDeposit(Deposit $deposit)
    {
        return view('admin.deposits.show', [
            'deposit' => $deposit->load(['user', 'paymentMethod']),
        ]);
    }

    /** Idempotent: only pending deposits are credited, inside a DB transaction. */
    public function approveDeposit(Deposit $deposit)
    {
        $deposit = DB::transaction(function () use ($deposit) {
            $fresh = Deposit::whereKey($deposit->id)->lockForUpdate()->firstOrFail();

            if ((int) $fresh->status !== Deposit::STATUS_PENDING) {
                return $fresh; // already handled — never credit twice
            }

            $fresh->update(['status' => Deposit::STATUS_APPROVED]);
            User::whereKey($fresh->user_id)->lockForUpdate()->increment('account_bal', $fresh->amount);

            return $fresh;
        });

        $deposit->load('user');
        SendMail::dispatch($deposit->user->email, 'Deposit Approval Notification', [
            'name' => $deposit->user->name,
            'title' => 'Deposit Approval Notification',
            'message' => "We have successfully approved your deposit request of \${$deposit->amount} through {$deposit->method_name}. Your account has been credited.<br><br>Thanks for trusting our services.",
        ], [
            'name' => 'Admin',
            'title' => 'Deposit Approval Notification',
            'message' => "You approved {$deposit->user->name}'s deposit of \${$deposit->amount} through {$deposit->method_name}.",
        ]);

        return back()->with('success', 'Deposit approved and user credited.');
    }

    public function rejectDeposit(Request $request, Deposit $deposit)
    {
        $request->validate(['admin_remark' => ['nullable', 'string', 'max:1000']]);

        $deposit = DB::transaction(function () use ($request, $deposit) {
            $fresh = Deposit::whereKey($deposit->id)->lockForUpdate()->firstOrFail();

            if ((int) $fresh->status !== Deposit::STATUS_PENDING) {
                return $fresh;
            }

            $fresh->update(['status' => Deposit::STATUS_REJECTED, 'admin_remark' => $request->input('admin_remark')]);

            return $fresh;
        });

        $deposit->load('user');
        SendMail::dispatch($deposit->user->email, 'Deposit Denied Notification', [
            'name' => $deposit->user->name,
            'title' => 'Deposit Denied Notification',
            'message' => "We have regretfully denied your deposit request of \${$deposit->amount} through {$deposit->method_name}. Your account will not be credited."
               .($deposit->admin_remark ? '<br><br>Reason: '.e($deposit->admin_remark) : ''),
        ], [
            'name' => 'Admin',
            'title' => 'Deposit Denied Notification',
            'message' => "You denied {$deposit->user->name}'s deposit of \${$deposit->amount} through {$deposit->method_name}.",
        ]);

        return back()->with('success', 'Deposit rejected.');
    }

    // ---------- WITHDRAWALS ----------

    public function withdrawals(Request $request)
    {
        $query = withdrawal::with(['user', 'paymentMethod'])->orderByRaw('status = 1 desc')->orderByDesc('created_at');

        if ($request->filled('status')) {
            $query->where('status', (int) $request->input('status'));
        }
        if ($request->filled('search')) {
            $s = '%'.$request->string('search')->toString().'%';
            $query->where(fn ($q) => $q->where('reference', 'like', $s)
                ->orWhere('account_name', 'like', $s)
                ->orWhere('bank_name', 'like', $s)
                ->orWhereHas('user', fn ($u) => $u->where('name', 'like', $s)->orWhere('email', 'like', $s)));
        }

        return view('admin.withdrawals.index', [
            'withdrawals' => $query->paginate(20)->withQueryString(),
            'filters' => $request->only(['status', 'search']),
        ]);
    }

    public function showWithdrawal(withdrawal $withdrawal)
    {
        return view('admin.withdrawals.show', [
            'withdrawal' => $withdrawal->load(['user', 'paymentMethod']),
        ]);
    }

    /**
     * Idempotent. Balance was already deducted at request time, so approval
     * only flips the status — never touches the balance.
     */
    public function approveWithdrawal(withdrawal $withdrawal)
    {
        DB::transaction(function () use ($withdrawal) {
            $fresh = withdrawal::whereKey($withdrawal->id)->lockForUpdate()->firstOrFail();

            if ((int) $fresh->status !== withdrawal::STATUS_PENDING) {
                return;
            }

            $fresh->update(['status' => withdrawal::STATUS_APPROVED]);
        });

        $withdrawal->load('user');
        SendMail::dispatch($withdrawal->user->email, 'Withdrawal Approval Notification', [
            'name' => $withdrawal->user->name,
            'title' => 'Withdrawal Approval Notification',
            'message' => "We have successfully approved your withdrawal request of \${$withdrawal->amount}.",
        ], [
            'name' => 'Admin',
            'title' => 'Withdrawal Approval Notification',
            'message' => "You approved {$withdrawal->user->name}'s withdrawal of \${$withdrawal->amount}.",
        ]);

        return back()->with('success', 'Withdrawal approved.');
    }

    /**
     * Idempotent refund: balance is returned exactly once, inside a DB transaction.
     */
    public function rejectWithdrawal(Request $request, withdrawal $withdrawal)
    {
        $request->validate(['admin_remark' => ['nullable', 'string', 'max:1000']]);

        DB::transaction(function () use ($request, $withdrawal) {
            $fresh = withdrawal::whereKey($withdrawal->id)->lockForUpdate()->firstOrFail();

            if ((int) $fresh->status !== withdrawal::STATUS_PENDING) {
                return;
            }

            $fresh->update(['status' => withdrawal::STATUS_REJECTED, 'admin_remark' => $request->input('admin_remark')]);
            User::whereKey($fresh->user_id)->lockForUpdate()->increment('account_bal', $fresh->amount);
        });

        $withdrawal->load('user');
        SendMail::dispatch($withdrawal->user->email, 'Withdrawal Denied Notification', [
            'name' => $withdrawal->user->name,
            'title' => 'Withdrawal Denied Notification',
            'message' => "We have regretfully denied your withdrawal request of \${$withdrawal->amount}. The amount has been refunded to your balance."
               .($request->input('admin_remark') ? '<br><br>Reason: '.e($request->input('admin_remark')) : ''),
        ], [
            'name' => 'Admin',
            'title' => 'Withdrawal Denied Notification',
            'message' => "You denied {$withdrawal->user->name}'s withdrawal of \${$withdrawal->amount}. The amount was refunded.",
        ]);

        return back()->with('success', 'Withdrawal rejected and amount refunded.');
    }
}
