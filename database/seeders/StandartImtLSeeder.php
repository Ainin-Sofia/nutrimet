<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StandartImtLSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('standart_imt_l')->insert([
            'umur_tahun' => 10,
            'umur_bulan' => 0,
            'min_satu_sd' => 14.9,
            'median' => 16.4,
            'plus_satu_sd' => 18.5,
        ]);

        DB::table('standart_imt_l')->insert([
            'umur_tahun' => 10,
            'umur_bulan' => 1,
            'min_satu_sd' => 15.0,
            'median' => 16.5,
            'plus_satu_sd' => 18.5,
        ]);

        DB::table('standart_imt_l')->insert([
            'umur_tahun' => 10,
            'umur_bulan' => 2,
            'min_satu_sd' => 15.0,
            'median' => 16.5,
            'plus_satu_sd' => 18.6,
        ]);

        DB::table('standart_imt_l')->insert([
            'umur_tahun' => 10,
            'umur_bulan' => 3,
            'min_satu_sd' => 15.0,
            'median' => 16.5,
            'plus_satu_sd' => 18.6,
        ]);

        DB::table('standart_imt_l')->insert([
            'umur_tahun' => 10,
            'umur_bulan' => 4,
            'min_satu_sd' => 15.0,
            'median' => 16.6,
            'plus_satu_sd' => 18.7,
        ]);

        DB::table('standart_imt_l')->insert([
            'umur_tahun' => 10,
            'umur_bulan' => 5,
            'min_satu_sd' => 15.1,
            'median' => 16.6,
            'plus_satu_sd' => 18.8,
        ]);

        DB::table('standart_imt_l')->insert([
            'umur_tahun' => 10,
            'umur_bulan' => 6,
            'min_satu_sd' => 15.1,
            'median' => 16.7,
            'plus_satu_sd' => 18.8,
        ]);

        DB::table('standart_imt_l')->insert([
            'umur_tahun' => 10,
            'umur_bulan' => 7,
            'min_satu_sd' => 15.1,
            'median' => 16.7,
            'plus_satu_sd' => 18.9,
        ]);

        DB::table('standart_imt_l')->insert([
            'umur_tahun' => 10,
            'umur_bulan' => 8,
            'min_satu_sd' => 15.2,
            'median' => 16.8,
            'plus_satu_sd' => 18.9,
        ]);

        DB::table('standart_imt_l')->insert([
            'umur_tahun' => 10,
            'umur_bulan' => 9,
            'min_satu_sd' => 15.2,
            'median' => 16.8,
            'plus_satu_sd' => 19.0,
        ]);

        DB::table('standart_imt_l')->insert([
            'umur_tahun' => 10,
            'umur_bulan' => 10,
            'min_satu_sd' => 15.2,
            'median' => 16.9,
            'plus_satu_sd' => 19.0,
        ]);

        DB::table('standart_imt_l')->insert([
            'umur_tahun' => 10,
            'umur_bulan' => 11,
            'min_satu_sd' => 15.3,
            'median' => 16.9,
            'plus_satu_sd' => 19.1,
        ]);
    }
}
