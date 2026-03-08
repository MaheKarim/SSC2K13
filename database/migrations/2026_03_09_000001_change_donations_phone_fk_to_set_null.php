<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * Change the foreign key on donations.sent_to_phone_id from
     * cascade delete to set null, so that deleting a phone number
     * does NOT delete its associated donations.
     */
    public function up(): void
    {
        Schema::table('donations', function (Blueprint $table) {
            // Drop the existing foreign key constraint
            $table->dropForeign(['sent_to_phone_id']);

            // Make the column nullable (required for SET NULL to work)
            $table->foreignId('sent_to_phone_id')->nullable()->change();

            // Re-add the foreign key with SET NULL on delete
            $table->foreign('sent_to_phone_id')
                ->references('id')
                ->on('phone_numbers')
                ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('donations', function (Blueprint $table) {
            $table->dropForeign(['sent_to_phone_id']);

            $table->foreignId('sent_to_phone_id')->nullable(false)->change();

            $table->foreign('sent_to_phone_id')
                ->references('id')
                ->on('phone_numbers')
                ->onDelete('cascade');
        });
    }
};
