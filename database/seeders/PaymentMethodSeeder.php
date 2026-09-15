<?php

namespace Database\Seeders;

use App\Models\PaymentMethod;
use App\Models\PaymentMethodField;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PaymentMethodSeeder extends Seeder
{
    public function run(): void
    {
        $methods = [
            [
                'name' => 'Bank Transfer',
                'type' => 'bank',
                'description' => 'Direct bank-to-bank transfer.',
                'instructions' => "1. Transfer the exact amount to the bank account details provided.\n2. Keep your transfer receipt.\n3. Upload your proof of payment below and submit.",
                'sort_order' => 1,
                'fields' => [
                    ['label' => 'Bank Name', 'type' => 'text', 'required' => true, 'order' => 1],
                    ['label' => 'Account Name', 'type' => 'text', 'required' => true, 'order' => 2],
                    ['label' => 'Account Number', 'type' => 'text', 'required' => true, 'order' => 3],
                    ['label' => 'Routing Number', 'type' => 'text', 'required' => false, 'order' => 4],
                    ['label' => 'Reference', 'type' => 'text', 'required' => false, 'order' => 5],
                ],
            ],
            [
                'name' => 'PayPal',
                'type' => 'fast_payment',
                'description' => 'Pay with your PayPal account.',
                'instructions' => "1. Send the amount to our PayPal email.\n2. Upload the payment confirmation screenshot below.",
                'sort_order' => 2,
                'fields' => [
                    ['label' => 'PayPal Email', 'type' => 'email', 'required' => true, 'order' => 1],
                    ['label' => 'Account Name', 'type' => 'text', 'required' => false, 'order' => 2],
                ],
            ],
            [
                'name' => 'CashApp',
                'type' => 'fast_payment',
                'description' => 'Pay with CashApp.',
                'instructions' => "1. Send the amount to our CashApp tag.\n2. Upload the payment confirmation screenshot below.",
                'sort_order' => 3,
                'fields' => [
                    ['label' => 'CashApp Username', 'type' => 'text', 'required' => true, 'order' => 1],
                ],
            ],
            [
                'name' => 'STC Bank',
                'type' => 'bank',
                'description' => 'Transfer via STC Bank.',
                'instructions' => "1. Transfer the exact amount to the STC Bank account details provided.\n2. Upload your proof of payment below and submit.",
                'sort_order' => 4,
                'fields' => [
                    ['label' => 'Bank Name', 'type' => 'text', 'required' => true, 'order' => 1],
                    ['label' => 'Account Name', 'type' => 'text', 'required' => true, 'order' => 2],
                    ['label' => 'Account Number', 'type' => 'text', 'required' => true, 'order' => 3],
                    ['label' => 'Reference', 'type' => 'text', 'required' => false, 'order' => 4],
                ],
            ],
            [
                'name' => 'ETH',
                'type' => 'crypto',
                'description' => 'Pay with Ethereum.',
                'instructions' => "1. Send the exact ETH amount to the wallet address shown.\n2. Make sure you use the correct network.\n3. Upload the transaction confirmation below.",
                'sort_order' => 5,
                'fields' => [
                    ['label' => 'Wallet Address', 'type' => 'text', 'required' => true, 'order' => 1],
                    ['label' => 'Network', 'type' => 'select', 'required' => true, 'order' => 2, 'options' => ['Ethereum', 'ERC20']],
                ],
            ],
            [
                'name' => 'USDT',
                'type' => 'crypto',
                'description' => 'Pay with Tether (USDT).',
                'instructions' => "1. Send the exact USDT amount to the wallet address shown.\n2. Select the correct network before sending.\n3. Upload the transaction confirmation below.",
                'sort_order' => 6,
                'fields' => [
                    ['label' => 'Wallet Address', 'type' => 'text', 'required' => true, 'order' => 1],
                    ['label' => 'Network', 'type' => 'select', 'required' => true, 'order' => 2, 'options' => ['TRC20', 'ERC20', 'BEP20']],
                ],
            ],
            [
                'name' => 'Western Union',
                'type' => 'money_transfer',
                'description' => 'Send money via Western Union.',
                'instructions' => "1. Send the amount via Western Union to the receiver details provided.\n2. Keep your MTCN receipt.\n3. Upload the receipt below and submit.",
                'sort_order' => 7,
                'fields' => [
                    ['label' => 'Receiver Name', 'type' => 'text', 'required' => true, 'order' => 1],
                    ['label' => 'Country', 'type' => 'text', 'required' => true, 'order' => 2],
                    ['label' => 'City', 'type' => 'text', 'required' => false, 'order' => 3],
                    ['label' => 'Reference', 'type' => 'text', 'required' => false, 'order' => 4],
                ],
            ],
            [
                'name' => 'MoneyGram',
                'type' => 'money_transfer',
                'description' => 'Send money via MoneyGram.',
                'instructions' => "1. Send the amount via MoneyGram to the receiver details provided.\n2. Keep your reference receipt.\n3. Upload the receipt below and submit.",
                'sort_order' => 8,
                'fields' => [
                    ['label' => 'Receiver Name', 'type' => 'text', 'required' => true, 'order' => 1],
                    ['label' => 'Country', 'type' => 'text', 'required' => true, 'order' => 2],
                    ['label' => 'City', 'type' => 'text', 'required' => false, 'order' => 3],
                    ['label' => 'Reference', 'type' => 'text', 'required' => false, 'order' => 4],
                ],
            ],
        ];

        foreach ($methods as $data) {
            $method = PaymentMethod::firstOrCreate(
                ['slug' => Str::slug($data['name'])],
                [
                    'name' => $data['name'],
                    'type' => $data['type'],
                    'description' => $data['description'],
                    'instructions' => $data['instructions'],
                    'deposit_enabled' => true,
                    'withdrawal_enabled' => true,
                    'is_active' => true,
                    'sort_order' => $data['sort_order'],
                ]
            );

            foreach ($data['fields'] as $f) {
                PaymentMethodField::firstOrCreate(
                    ['payment_method_id' => $method->id, 'name' => PaymentMethodField::makeKey($f['label'])],
                    [
                        'label' => $f['label'],
                        'type' => $f['type'],
                        'options' => $f['options'] ?? null,
                        'is_required' => $f['required'],
                        'show_on' => 'both',
                        'sort_order' => $f['order'],
                        'is_active' => true,
                    ]
                );
            }
        }
    }
}
