<?php

namespace App\Http\Controllers;

use App\Models\Tipe;
use Illuminate\Http\Request;

class TipeController extends Controller
{
    public function index()
    {
        $tipies = Tipe::all();
        return view('tipe.index', compact('tipies'));
    }

    public function create()
    {
        return view('tipe.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_tipe' => 'required|string|max:255',
        ]);

        Tipe::create($request->all());
        return redirect()->route('tipe.index')->with('success', 'Tipe created successfully.');
    }

    public function show(Tipe $tipe)
    {
        return view('tipe.show', compact('tipe'));
    }

    public function edit(Tipe $tipe)
    {
        return view('tipe.edit', compact('tipe'));
    }

    public function update(Request $request, Tipe $tipe)
    {
        $request->validate([
            'nama_tipe' => 'required|string|max:255',
        ]);

        $tipe->update($request->all());
        return redirect()->route('tipe.index')->with('success', 'Tipe updated successfully.');
    }

    public function destroy(Tipe $tipe)
    {
        $tipe->delete();
        return redirect()->route('tipe.index')->with('success', 'Tipe deleted successfully.');
    }
}
