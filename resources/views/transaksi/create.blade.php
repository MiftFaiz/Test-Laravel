@extends('home.layout')  

@section('content')
<div class="container">
    <h2>Create Transaksi</h2>
    
    <form action="{{ route('transaksi.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="tipe_id">Tipe</label>
            <select class="form-control" id="tipe_id" name="tipe_id" required>
                <option value="">Pilih Tipe</option>
                @foreach ($tipes as $t)
                    <option value="{{ $t->id }}">{{ $t->nama_tipe }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="kategori_id">Kategori</label>
            <select class="form-control" id="kategori_id" name="kategori_id" required>
                <option value="">Pilih Kategori</option>
                
            </select>
        </div>

        <div class="form-group">
            <label for="total_biaya">Total Biaya</label>
            <input type="number" class="form-control" id="total_biaya" name="total_biaya" required>
        </div>

        <div class="form-group">
            <label for="tanggal_pemasukan">Tanggal Pemasukan</label>
            <input type="date" class="form-control" id="tanggal_pemasukan" name="tanggal_pemasukan" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>

<script>
    
    var kategoriByTipe = @json($kategoris->groupBy('tipe_id'));

    document.getElementById('tipe_id').addEventListener('change', function() {
        var tipeId = this.value;
        var kategoriSelect = document.getElementById('kategori_id');

        
        kategoriSelect.innerHTML = '<option value="">Pilih Kategori</option>';

        
        if (kategoriByTipe[tipeId]) {
            kategoriByTipe[tipeId].forEach(function(kategori) {
                var option = document.createElement('option');
                option.value = kategori.id;
                option.textContent = kategori.nama_kategori;
                kategoriSelect.appendChild(option);
            });
        }
    });
</script>
@endsection
