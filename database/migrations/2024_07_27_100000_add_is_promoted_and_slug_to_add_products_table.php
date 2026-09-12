<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('add_products', function (Blueprint $table) {
            $table->boolean('is_promoted')->default(false)->after('status');
            $table->string('slug')->nullable()->after('is_promoted');

            $table->unique('slug');
        });
    }

    public function down(): void
    {
        Schema::table('add_products', function (Blueprint $table) {
            $table->dropIndex(['slug']);
            $table->dropColumn(['is_promoted', 'slug']);
        });
    }
};
