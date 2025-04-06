<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            ['name' => 'Breakfast', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Lunch', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Dinner', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Desserts', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Drinks', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
