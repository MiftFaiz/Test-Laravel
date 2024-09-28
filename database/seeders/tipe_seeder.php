<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class tipe_seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tipe')->insert([
            ['nama_tipe' => 'Pemasukan'],
            ['nama_tipe' => 'Pengeluaran'],
        ]);
    }
}
