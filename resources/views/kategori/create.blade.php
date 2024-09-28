@extends('home.layout')

@section('content')
<div class="container mt-4">
    <h2 class="text-center">Tambah Kategori</h2>

    <form action="{{ route('kategori.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nama_kategori">Nama Kategori</label>
            <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" required>
        </div>
        <div class="form-group">
            <label for="tipe_id">Tipe</label>
            <select class="form-control" id="tipe_id" name="tipe_id" required>
                @foreach ($tipe as $t)
                    <option value="{{ $t->id }}">{{ $t->nama_tipe }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('kategori.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
