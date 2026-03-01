<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create default admin
        Admin::firstOrCreate(
            ['email' => 'general@ssc2013.com'],
            [
                'name' => 'General Admin',
                'password' => Hash::make('general@ssc2013'),
                'is_active' => true,
            ]
        );
    }
}
