@extends('home.layout') 

@section('content')
<div class="container mt-4">
    <h2 class="text-center">Edit Tipe</h2>

    <form action="{{ route('tipe.update', $tipe->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nama_tipe">Nama Tipe</label>
            <input type="text" class="form-control" id="nama_tipe" name="nama_tipe" value="{{ $tipe->nama_tipe }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('tipe.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
