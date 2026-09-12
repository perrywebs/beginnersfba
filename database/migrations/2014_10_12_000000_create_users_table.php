<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone');
            $table->string('country');
            $table->integer('account_bal')->default(0);
            $table->integer('number_of_sales')->default(0);
            $table->integer('total_sales')->default(0);
            $table->integer('total_product')->default(0);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->integer('role')->default(1); // 1 is user and 2 is admin
            $table->integer('last_30_days')->default(0); // 1 is user and 2 is admin
            $table->integer('last_year')->default(0); // 1 is user and 2 is admin
            $table->integer('tax_code')->default(0); 
            $table->integer('imf_code')->default(0); 
            $table->integer('cot_code')->default(0); 
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
