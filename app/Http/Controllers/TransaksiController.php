<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\Kategori;
use App\Models\Tipe;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index()
    {
        $transaksis = Transaksi::all();
        
        return view('transaksi.index', compact('transaksis'));
    }

    public function create()
    {
        $kategoris = Kategori::all();
        $tipes = Tipe::all();
        return view('transaksi.create', compact('kategoris', 'tipes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kategori_id' => 'required|exists:kategori,id',
            'total_biaya' => 'required|integer',
            'tanggal_pemasukan' => 'required|date',
        ]);

        Transaksi::create($request->all());
        return redirect()->route('transaksi.index')->with('success', 'Transaksi created successfully.');
    }

    public function show(Transaksi $transaksi)
    {
        return view('transaksi.show', compact('transaksi'));
    }

    public function edit(Transaksi $transaksi)
    {
        $kategoris = Kategori::all();
        $tipes = Tipe::all();
        return view('transaksi.edit', compact('transaksi'),compact('kategoris','tipes'));
    }

    public function update(Request $request, Transaksi $transaksi)
    {
        $request->validate([
            'kategori_id' => 'required|exists:kategori,id',
            'total_biaya' => 'required|integer',
            'tanggal_pemasukan' => 'required|date',
        ]);

        $transaksi->update($request->all());
        return redirect()->route('transaksi.index')->with('success', 'Transaksi updated successfully.');
    }

    public function destroy(Transaksi $transaksi)
    {
        $transaksi->delete();
        return redirect()->route('transaksi.index')->with('success', 'Transaksi deleted successfully.');
    }
}
