<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('donations', function (Blueprint $table) {
            $table->string('transaction_id')->nullable()->change();
            $table->string('screenshot')->nullable()->after('transaction_id');
        });
    }

    public function down(): void
    {
        Schema::table('donations', function (Blueprint $table) {
            $table->string('transaction_id')->nullable(false)->change();
            $table->dropColumn('screenshot');
        });
    }
};
