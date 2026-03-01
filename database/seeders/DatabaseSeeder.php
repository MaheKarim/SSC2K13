<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;
use App\Models\PhoneNumber;
use App\Models\JerseySize;
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
            ['email' => 'admin@ssc2013.com'],
            [
                'name' => 'Admin',
                'password' => Hash::make('admin123'),
                'is_active' => true,
            ]
        );

        // Create another admin
        Admin::firstOrCreate(
            ['email' => 'sarif@ssc2013.com'],
            [
                'name' => 'Sarif',
                'password' => Hash::make('@ssc2013'),
                'is_active' => true,
            ]
        );

        // Create phone numbers
        // $phoneNumbers = [
        //     ['number' => '01711111111', 'operator' => 'bKash'],
        //     ['number' => '01811111111', 'operator' => 'Nagad'],
        //     ['number' => '01911111111', 'operator' => 'Rocket'],
        // ];

        // foreach ($phoneNumbers as $phone) {
        //     PhoneNumber::create([
        //         'number' => $phone['number'],
        //         'operator' => $phone['operator'],
        //         'active' => true,
        //     ]);
        // }

        // Create jersey sizes
        // $sizes = ['S', 'M', 'L', 'XL', 'XXL', 'XXXL'];

        // foreach ($sizes as $size) {
        //     JerseySize::create([
        //         'size' => $size,
        //         'active' => true,
        //     ]);
        // }
    }
}
