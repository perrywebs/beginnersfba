<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Backward-compatible: only ADDS nullable columns, never touches existing data.
     * Also adds the legacy `proof_image` column the FundModal already writes to.
     */
    public function up(): void
    {
        Schema::table('deposits', function (Blueprint $table) {
            if (! Schema::hasColumn('deposits', 'payment_method_id')) {
                $table->foreignId('payment_method_id')->nullable()->after('user_id')
                    ->constrained('payment_methods')->nullOnDelete();
            }
            if (! Schema::hasColumn('deposits', 'reference')) {
                $table->string('reference')->nullable()->unique()->after('payment_method_id');
            }
            if (! Schema::hasColumn('deposits', 'proof_image')) {
                $table->string('proof_image')->nullable()->after('payment_method');
            }
            if (! Schema::hasColumn('deposits', 'method_snapshot')) {
                $table->json('method_snapshot')->nullable()->after('proof_image');
            }
            if (! Schema::hasColumn('deposits', 'details')) {
                $table->json('details')->nullable()->after('method_snapshot');
            }
            if (! Schema::hasColumn('deposits', 'admin_remark')) {
                $table->text('admin_remark')->nullable()->after('details');
            }
        });
    }

    public function down(): void
    {
        Schema::table('deposits', function (Blueprint $table) {
            $table->dropForeign(['payment_method_id']);
            $table->dropColumn(['payment_method_id', 'reference', 'proof_image', 'method_snapshot', 'details', 'admin_remark']);
        });
    }
};
