<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('donations', function (Blueprint $table) {
            $table->decimal('paid_amount', 10, 2)->default(0)->after('amount');
            $table->decimal('due_amount', 10, 2)->default(0)->after('paid_amount');
            $table->enum('payment_status', ['unpaid', 'partial_paid', 'paid_in_full'])->default('unpaid')->after('status');
            $table->enum('payment_type', ['full_upfront', 'partial_upfront'])->default('full_upfront')->after('payment_status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('donations', function (Blueprint $table) {
            $table->dropColumn(['paid_amount', 'due_amount', 'payment_status', 'payment_type']);
        });
    }
};