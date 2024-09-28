<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class kategori_seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $kategoriPemasukan = [
            'Gaji', 'Bonus', 'Penjualan Barang', 'Bunga Bank', 'Investasi', 
            'Hadiah', 'Uang Saku', 'Pendapatan Lain', 'Pengembalian Dana', 'Hasil Sewa'
        ];

        $kategoriPengeluaran = [
            'Makanan', 'Transportasi', 'Hiburan', 'Pendidikan', 'Kesehatan', 
            'Pakaian', 'Tagihan Listrik', 'Air', 'Internet', 'Peralatan Rumah'
        ];

        $tipePemasukanId = DB::table('tipe')->where('nama_tipe', 'Pemasukan')->value('id');
        $tipePengeluaranId = DB::table('tipe')->where('nama_tipe', 'Pengeluaran')->value('id');

        foreach ($kategoriPemasukan as $kategori) {
            DB::table('kategori')->insert([
                'nama_kategori' => $kategori,
                'tipe_id' => $tipePemasukanId,
            ]);
        }

        foreach ($kategoriPengeluaran as $kategori) {
            DB::table('kategori')->insert([
                'nama_kategori' => $kategori,
                'tipe_id' => $tipePengeluaranId,
            ]);
        }
    }
}
