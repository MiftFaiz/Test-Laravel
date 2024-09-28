@extends('home.layout')

@section('content')
<div class="container mt-4">
    <h1>Detail Transaksi</h1>
    <div class="mb-3">
        <strong>Tipe:</strong> {{ $transaksi->kategori->tipe ? $transaksi->kategori->tipe->nama_tipe : 'Tidak Diketahui' }}
    </div>
    <div class="mb-3">
        <strong>Kategori:</strong> {{ $transaksi->kategori ? $transaksi->kategori->nama_kategori : 'Tidak Diketahui' }}
    </div>
    <div class="mb-3">
        <strong>Total Biaya:</strong> {{ $transaksi->total_biaya }}
    </div>
    <div class="mb-3">
        <strong>Tanggal Pemasukan:</strong> {{ $transaksi->tanggal_pemasukan }}
    </div>
    <a href="{{ route('transaksi.index') }}" class="btn btn-primary">Kembali</a>
</div>
@endsection
