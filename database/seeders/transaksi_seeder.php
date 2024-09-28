<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class transaksi_seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
     public function run()
    {
        $kategoriIds = DB::table('kategori')->pluck('id')->toArray();

        for ($i = 0; $i < 10; $i++) {
            DB::table('transaksi')->insert([
                'kategori_id' => $kategoriIds[array_rand($kategoriIds)], // Pilih random id dari kategori
                'total_biaya' => rand(100000, 1000000), // Nilai random untuk total biaya
                'tanggal_pemasukan' => Carbon::now()->subDays(rand(1, 30)), // Tanggal random dalam 30 hari terakhir
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
