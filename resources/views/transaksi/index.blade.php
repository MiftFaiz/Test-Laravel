@extends('home.layout')

@section('content')
<div class="container mt-4">
    <h2 class="text-center">Transaksi</h2>
    <div class="mb-3 text-right">
        <a href="{{ route('transaksi.create') }}" class="btn btn-success">
            <i class="fas fa-plus"></i> Tambah Transaksi
        </a>
    </div>
    @if(session('success'))
        <div class="alert alert-success mt-2">{{ session('success') }}</div>
    @endif
    <table class="table table-striped">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Kategori</th>
                <th>Tipe</th>
                <th>Total Biaya</th>
                <th>Tanggal Pemasukan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transaksis as $transaksi)
                <tr>
                <td>{{ $transaksi->id }}</td>
                <td>{{ $transaksi->kategori ? $transaksi->kategori->nama_kategori : 'Tidak Diketahui' }}</td>
                <td>
                    {{ $transaksi->kategori && $transaksi->kategori->tipe ? $transaksi->kategori->tipe->nama_tipe : 'Tidak Diketahui' }}
                </td>
                <td>{{ $transaksi->total_biaya }}</td>
                <td>{{ $transaksi->tanggal_pemasukan }}</td>

                    <td>
                        <a href="{{ route('transaksi.show', $transaksi->id) }}" class="btn btn-info btn-sm"><i class="fas fa-eye"></i>Lihat</a>
                        <a href="{{ route('transaksi.edit', $transaksi->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i>Edit</a>
                        <form action="{{ route('transaksi.destroy', $transaksi->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus Tipe ini?')"><i class="fas fa-trash"></i>Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
