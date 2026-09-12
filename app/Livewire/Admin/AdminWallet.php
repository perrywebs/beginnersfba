<?php

namespace App\Livewire\Admin;

use App\Models\AdminWallet as ModelsAdminWallet;
use Livewire\Component;

class AdminWallet extends Component
{
    public $admin_wallet;

    public $bitcoin;
    public $usdt;
    public $ethereum;
    public $paypal;
    public $cash_app;
    public $money_gram;
    public $western_union;

    public function mount()
    {
        $this->admin_wallet = ModelsAdminWallet::where("id", 1)->first();

        if ($this->admin_wallet) {
            $this->bitcoin = $this->admin_wallet->bitcoin;
            $this->usdt = $this->admin_wallet->usdt;
            $this->ethereum = $this->admin_wallet->ethereum;
            $this->paypal = $this->admin_wallet->pay_pal;
            $this->cash_app = $this->admin_wallet->cash_app;
            $this->money_gram = $this->admin_wallet->money_gram;
            $this->western_union = $this->admin_wallet->western_union;
        } else {
            $this->bitcoin = '';
            $this->usdt = '';
            $this->ethereum = '';
            $this->paypal = '';
            $this->cash_app = '';
            $this->money_gram = '';
            $this->western_union = '';
        }
    }

    public function updateWallet()
    {
        $this->validate([
            'bitcoin' => 'nullable|string',
            'usdt' => 'nullable|string',
            'ethereum' => 'nullable|string',
            'paypal' => 'nullable|string',
            'cash_app' => 'nullable|string',
            'money_gram' => 'nullable|string',
            'western_union' => 'nullable|string',
        ]);

        if ($this->admin_wallet) {
            $this->admin_wallet->update([
                'bitcoin' => $this->bitcoin,
                'usdt' => $this->usdt,
                'ethereum' => $this->ethereum,
                'pay_pal' => $this->paypal,
                'cash_app' => $this->cash_app,
                'money_gram' => $this->money_gram,
                'western_union' => $this->western_union,
            ]);
        } else {
            ModelsAdminWallet::create([
                'bitcoin' => $this->bitcoin,
                'usdt' => $this->usdt,
                'ethereum' => $this->ethereum,
                'pay_pal' => $this->paypal,
                'cash_app' => $this->cash_app,
                'money_gram' => $this->money_gram,
                'western_union' => $this->western_union,
            ]);
        }

        session()->flash('success', 'Admin wallet updated successfully.');
        return redirect()->route('admin_wallet');
    }

    public function render()
    {
        return view('livewire.admin.admin-wallet');
    }
}
