<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Backward-compatible: only ADDS nullable columns.
     * Legacy bank columns are left untouched (still NOT NULL) — new dynamic
     * withdrawals fill them with compatibility values so old rows keep working.
     */
    public function up(): void
    {
        Schema::table('withdrawals', function (Blueprint $table) {
            if (! Schema::hasColumn('withdrawals', 'payment_method_id')) {
                $table->foreignId('payment_method_id')->nullable()->after('user_id')
                    ->constrained('payment_methods')->nullOnDelete();
            }
            if (! Schema::hasColumn('withdrawals', 'reference')) {
                $table->string('reference')->nullable()->unique()->after('payment_method_id');
            }
            if (! Schema::hasColumn('withdrawals', 'method_snapshot')) {
                $table->json('method_snapshot')->nullable()->after('swift_bic_code');
            }
            if (! Schema::hasColumn('withdrawals', 'details')) {
                $table->json('details')->nullable()->after('method_snapshot');
            }
            if (! Schema::hasColumn('withdrawals', 'admin_remark')) {
                $table->text('admin_remark')->nullable()->after('details');
            }
        });
    }

    public function down(): void
    {
        Schema::table('withdrawals', function (Blueprint $table) {
            $table->dropForeign(['payment_method_id']);
            $table->dropColumn(['payment_method_id', 'reference', 'method_snapshot', 'details', 'admin_remark']);
        });
    }
};
