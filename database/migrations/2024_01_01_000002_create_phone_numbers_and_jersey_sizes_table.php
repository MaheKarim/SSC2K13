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
        Schema::create('phone_numbers', function (Blueprint $table) {
            $table->id();
            $table->string('number');
            $table->string('operator'); // bKash, Nagad, Rocket, Bank
            $table->boolean('active')->default(true);
            $table->timestamps();
        });

        Schema::create('jersey_sizes', function (Blueprint $table) {
            $table->id();
            $table->string('size'); // S, M, L, XL, XXL, etc.
            $table->boolean('active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('phone_numbers');
        Schema::dropIfExists('jersey_sizes');
    }
};
