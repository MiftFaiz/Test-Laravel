@extends('home.layout')

@section('content')
<div class="container mt-4">
    <h2 class="text-center">Edit Kategori</h2>

    <form action="{{ route('kategori.update', $kategori->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nama_kategori">Nama Kategori</label>
            <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" value="{{ $kategori->nama_kategori }}" required>
        </div>
        <div class="form-group">
            <label for="tipe_id">Tipe</label>
            <select class="form-control" id="tipe_id" name="tipe_id" required>
                @foreach ($tipe as $t)
                    <option value="{{ $t->id }}" {{ $kategori->tipe_id == $t->id ? 'selected' : '' }}>
                        {{ $t->nama_tipe }}
                    </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('kategori.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
