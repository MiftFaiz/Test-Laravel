@extends('home.layout') 

@section('content')
<div class="container mt-4">
<h2 class="text-center">Tambah Tipe</h2>

    <form action="{{ route('tipe.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="Nama Tipe">Nama Tipe</label>
            <input type="text" class="form-control" id="Nama Tipe" name="nama_kategori" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('tipe.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
