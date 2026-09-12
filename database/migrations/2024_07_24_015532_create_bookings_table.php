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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('country');
            $table->string('watch_training_before_applying');
            $table->string('budget_to_invest');
            $table->longText('struggle_growing_business');
            $table->longText('experience_selling_on_amazon');
            $table->string('how_soon_will_you_start');
            $table->string('promise');
            $table->integer('status')->default(1); //1 is customers that have'nt been accepted 2 is accepted customers
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
