<?php

namespace App\Http\Controllers;
use App\Models\Transaksi;
use App\Models\Kategori;
use App\Models\Tipe;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Menampilkan dashboard home.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Ambil semua transaksi
        $transaksi = Transaksi::with('kategori')->get();

        // Hitung pemasukan per kategori dengan tipe_id = 1
        $pemasukanPerKategori = $transaksi->where('kategori.tipe_id', 1) // Hanya ambil transaksi dengan tipe_id 1
            ->groupBy('kategori_id')
            ->map(function ($group) {
                return $group->sum('total_biaya'); // Hitung total biaya
            });

        // Hitung pengeluaran per kategori dengan tipe_id = 2
        $pengeluaranPerKategori = $transaksi->where('kategori.tipe_id', 2) // Hanya ambil transaksi dengan tipe_id 2
            ->groupBy('kategori_id')
            ->map(function ($group) {
                return abs($group->sum('total_biaya')); // Hitung total biaya dan pastikan nilainya positif
            });

        // KPI
        $totalPemasukan = $pemasukanPerKategori->sum();
        $totalPengeluaran = $pengeluaranPerKategori->sum();
        $saldo = $totalPemasukan - $totalPengeluaran;

        // Ambil nama kategori untuk pemasukan dan pengeluaran
        $kategoriLabelsPemasukan = Kategori::whereIn('id', $pemasukanPerKategori->keys())
            ->pluck('nama_kategori')->toArray();

        $kategoriLabelsPengeluaran = Kategori::whereIn('id', $pengeluaranPerKategori->keys())
            ->pluck('nama_kategori')->toArray();

        return view('home.dashboard', compact('pemasukanPerKategori', 'pengeluaranPerKategori', 'totalPemasukan', 'totalPengeluaran', 'saldo', 'kategoriLabelsPemasukan', 'kategoriLabelsPengeluaran'));
    }




}
