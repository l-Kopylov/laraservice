<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdditionalOptionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('additional_options')->insert([
            ['name' => 'Ламинация потолка', 'price' => 1500, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Подсветка LED', 'price' => 2000, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Многоуровневый потолок', 'price' => 2500, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Установка дополнительных карнизов', 'price' => 1000, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Покраска', 'price' => 800, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Монтаж скрытых проводов', 'price' => 1200, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Антистатическая обработка', 'price' => 500, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
