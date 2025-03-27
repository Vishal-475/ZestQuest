<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'John Doe',  // Replace with any name
            'email' => 'john.doe@example.com', // Replace with any email
            'password' => Hash::make('SecurePass123!'), // A more secure password
        ]);
    }
}
