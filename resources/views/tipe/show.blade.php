@extends('home.layout') 

@section('content')
<div class="container">
    <h1>Detail Tipe</h1>

    <div class="mb-3">
        <strong>ID:</strong> {{ $tipe->id }}
    </div>
    <div class="mb-3">
        <strong>Nama Tipe:</strong> {{ $tipe->nama_tipe }}
    </div>

    <a href="{{ route('tipe.index') }}" class="btn btn-secondary">Kembali</a>
    <a href="{{ route('tipe.edit', $tipe->id) }}" class="btn btn-warning">Edit</a>
    <form action="{{ route('tipe.destroy', $tipe->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus Tipe ini?')">Hapus</button>
    </form>
</div>
@endsection
