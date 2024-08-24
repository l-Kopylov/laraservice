<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MaterialsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('materials')->insert([
            ['name' => 'Материал A', 'price_per_square_meter' => 250, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Материал B', 'price_per_square_meter' => 300, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Материал C', 'price_per_square_meter' => 400, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Материал D', 'price_per_square_meter' => 350, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Материал E', 'price_per_square_meter' => 450, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
