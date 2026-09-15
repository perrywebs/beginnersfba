<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('payment_methods', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            // Category/type chosen by admin: bank, crypto, fast_payment, e_wallet, money_transfer, other
            $table->string('type', 50)->default('other')->index();
            $table->string('description', 500)->nullable();
            $table->text('instructions')->nullable();
            $table->string('image_path')->nullable();
            $table->string('image_url', 500)->nullable();
            $table->boolean('deposit_enabled')->default(true);
            $table->boolean('withdrawal_enabled')->default(true);
            $table->boolean('is_active')->default(true)->index();
            $table->integer('sort_order')->default(0)->index();
            $table->decimal('min_deposit', 15, 2)->nullable();
            $table->decimal('max_deposit', 15, 2)->nullable();
            $table->decimal('min_withdrawal', 15, 2)->nullable();
            $table->decimal('max_withdrawal', 15, 2)->nullable();
            $table->decimal('fee_percent', 8, 2)->nullable();
            $table->decimal('fee_fixed', 15, 2)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('payment_methods');
    }
};
