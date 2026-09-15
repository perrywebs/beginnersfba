<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('payment_method_fields', function (Blueprint $table) {
            $table->id();
            $table->foreignId('payment_method_id')->constrained()->onDelete('cascade');
            $table->string('label');
            // snake_case key used in forms / stored in transaction details JSON
            $table->string('name');
            // text, number, email, textarea, select, url, tel, password
            $table->string('type', 30)->default('text');
            $table->string('placeholder', 500)->nullable();
            $table->string('help_text', 500)->nullable();
            // select options stored as JSON array of strings
            $table->json('options')->nullable();
            $table->boolean('is_required')->default(false);
            // deposit, withdrawal, both
            $table->string('show_on', 20)->default('both');
            $table->integer('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();

            $table->unique(['payment_method_id', 'name']);
            $table->index(['payment_method_id', 'sort_order']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('payment_method_fields');
    }
};
