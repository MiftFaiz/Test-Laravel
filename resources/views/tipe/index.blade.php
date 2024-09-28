@extends('home.layout') 

@section('content')
<div class="container mt-4">
    <h2 class="text-center">Tipe</h2>
    <div class="mb-3 text-right">
        <a href="{{ route('tipe.create') }}" class="btn btn-success">
            <i class="fas fa-plus"></i> Tambah Tipe
        </a>
    </div>
    @if(session('success'))
        <div class="alert alert-success mt-2">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <table class="table table-striped">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Nama Tipe</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tipies as $tipe)
                <tr>
                    <td>{{ $tipe->id }}</td>
                    <td>{{ $tipe->nama_tipe }}</td>
                    <td>
                        <a href="{{ route('tipe.show', $tipe->id) }}" class="btn btn-info btn-sm"><i class="fas fa-eye"></i> Lihat</a>
                        <a href="{{ route('tipe.edit', $tipe->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</a>
                        <form action="{{ route('tipe.destroy', $tipe->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus Tipe ini? Pastikan tidak ada kategori yang terkait.')"><i class="fas fa-trash"></i> Hapus</button>
                        </form>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
