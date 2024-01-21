<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StandartImtPSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('standart_imt_p')->insert([
            'umur_tahun' => 10,
            'umur_bulan' => 0,
            'min_satu_sd' => 14.8,
            'median' => 16.6,
            'plus_satu_sd' => 19.0,
        ]);

        DB::table('standart_imt_p')->insert([
            'umur_tahun' => 10,
            'umur_bulan' => 1,
            'min_satu_sd' => 14.9,
            'median' => 16.7,
            'plus_satu_sd' => 19.1,
        ]);
    }
}
