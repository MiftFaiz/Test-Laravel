@extends('home.layout')

@section('content')
<div class="container mt-4">
    <h2 class="text-center">Detail Kategori</h2>

    <div class="form-group">
        <label>ID</label>
        <p>{{ $kategori->id }}</p>
    </div>
    <div class="form-group">
        <label>Nama Kategori</label>
        <p>{{ $kategori->nama_kategori }}</p>
    </div>
    <div class="form-group">
        <label>Tipe</label>
        <p>{{ $kategori->tipe->nama_tipe }}</p>
    </div>
    
    <a href="{{ route('kategori.index') }}" class="btn btn-secondary">Kembali</a>
    <a href="{{ route('kategori.edit', $kategori->id) }}" class="btn btn-warning">Edit</a>
    <form action="{{ route('kategori.destroy', $kategori->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus Tipe ini?')">Hapus</button>
    </form>
</div>
@endsection
