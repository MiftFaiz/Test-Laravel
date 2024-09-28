@extends('home.layout')

@section('content')
<div class="container mt-4">
    <h2 class="text-center">Kategori</h2>
    
    <div class="mb-3 text-right">
        <a href="{{ route('kategori.create') }}" class="btn btn-success">
            <i class="fas fa-plus"></i> Tambah Kategori
        </a>
    </div>
    
    <table class="table table-striped">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Nama Kategori</th>
                <th>Tipe</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kategoris as $kategori)
            <tr>
                <td>{{ $kategori->id }}</td>
                <td>{{ $kategori->nama_kategori }}</td>
                <td>{{ $kategori->tipe->nama_tipe }}</td> <!-- Menampilkan nama tipe -->
                <td>
                    <a href="{{ route('kategori.show', $kategori->id) }}" class="btn btn-info btn-sm">
                        <i class="fas fa-eye"></i> Lihat
                    </a>
                    <a href="{{ route('kategori.edit', $kategori->id) }}" class="btn btn-warning btn-sm">
                        <i class="fas fa-edit"></i> Edit
                    </a>
                    <form action="{{ route('kategori.destroy', $kategori->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus kategori ini?')">
                            <i class="fas fa-trash"></i> Hapus
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    

</div>
@endsection
