@extends('home.layout')  <!-- Menggunakan layout yang sesuai -->

@section('content')
<div class="container">
    <h2>Edit Transaksi</h2>
    
    <form action="{{ route('transaksi.update', $transaksi->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="tipe_id">Tipe</label>
            <select class="form-control" id="tipe_id" name="tipe_id" required>
                <option value="">Pilih Tipe</option>
                @foreach ($tipes as $t)
                    <option value="{{ $t->id }}" {{ $t->id == $transaksi->kategori->tipe_id ? 'selected' : '' }}>
                        {{ $t->nama_tipe }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="kategori_id">Kategori</label>
            <select class="form-control" id="kategori_id" name="kategori_id" required>
                <option value="">Pilih Kategori</option>
                @foreach ($kategoris as $k)
                    @if ($k->tipe_id == $transaksi->kategori->tipe_id)
                        <option value="{{ $k->id }}" {{ $k->id == $transaksi->kategori_id ? 'selected' : '' }}>
                            {{ $k->nama_kategori }}
                        </option>
                    @endif
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="total_biaya">Total Biaya</label>
            <input type="number" class="form-control" id="total_biaya" name="total_biaya" value="{{ $transaksi->total_biaya }}" required>
        </div>

        <div class="form-group">
            <label for="tanggal_pemasukan">Tanggal Pemasukan</label>
            <input type="date" class="form-control" id="tanggal_pemasukan" name="tanggal_pemasukan" 
                value="{{ \Carbon\Carbon::parse($transaksi->tanggal_pemasukan)->format('Y-m-d') }}" required>
        </div>


        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>

<script>
    // Kelompokkan kategori berdasarkan tipe_id
    var kategoriByTipe = @json($kategoris->groupBy('tipe_id'));

    document.getElementById('tipe_id').addEventListener('change', function() {
        var tipeId = this.value;
        var kategoriSelect = document.getElementById('kategori_id');

        // Kosongkan opsi kategori
        kategoriSelect.innerHTML = '<option value="">Pilih Kategori</option>';

        // Periksa apakah ada kategori untuk tipe yang dipilih
        if (kategoriByTipe[tipeId]) {
            kategoriByTipe[tipeId].forEach(function(kategori) {
                var option = document.createElement('option');
                option.value = kategori.id;
                option.textContent = kategori.nama_kategori;
                kategoriSelect.appendChild(option);
            });
        }
    });

    // Set kategori yang sudah dipilih saat page load
    document.addEventListener('DOMContentLoaded', function() {
        var selectedTipeId = document.getElementById('tipe_id').value;
        var kategoriSelect = document.getElementById('kategori_id');

        if (selectedTipeId) {
            kategoriSelect.innerHTML = '<option value="">Pilih Kategori</option>'; // Reset kategori

            kategoriByTipe[selectedTipeId].forEach(function(kategori) {
                var option = document.createElement('option');
                option.value = kategori.id;
                option.textContent = kategori.nama_kategori;
                if (kategori.id == "{{ $transaksi->kategori_id }}") {
                    option.selected = true; // Menandai kategori yang sudah dipilih
                }
                kategoriSelect.appendChild(option);
            });
        }
    });
</script>
@endsection
