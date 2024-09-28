<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Tipe;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        $kategoris = Kategori::all();
        return view('kategori.index', compact('kategoris'));
    }

    public function create()
    {
        $tipe = Tipe::all();
        return view('kategori.create', compact('tipe'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_kategori' => 'required|string|max:255',
            'tipe_id' => 'required|exists:tipe,id',
        ]);

        $Kategori = Kategori::create([
            'nama_kategori' => $validatedData['nama_kategori'],
            'tipe_id' => $validatedData['tipe_id'],
        ]);
        return redirect()->route('kategori.index')->with('success', 'Kategori created successfully.');
    }

    public function show(Kategori $kategori)
    {
        return view('kategori.show', compact('kategori'));
    }

    public function edit($id)
    {
        $kategori = Kategori::findOrFail($id);
        $tipe = Tipe::all();
        return view('kategori.edit', compact('kategori', 'tipe'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:255',
            'tipe_id' => 'required|exists:tipe,id',
        ]);

        $kategori = Kategori::findOrFail($id);
        $kategori->update($request->all());
        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $kategori = Kategori::find($id);


        if ($kategori->transaksi()->count() > 0) {
            return redirect()->back()->with('error', 'Kategori ini tidak dapat dihapus karena memiliki entri terkait.');
        }


        $kategori->delete();

        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil dihapus.');
    }

}
