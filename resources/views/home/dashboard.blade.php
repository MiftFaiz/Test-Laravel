@extends('home.layout')

@section('content')
<div class="container">
    <h2 class="text-center mb-4">Dashboard</h2>

    <!-- Row for Total Stats -->
    <div class="row d-flex justify-content-center mb-4">
        <div class="col-md-4 mb-3">
            <div class="card text-white bg-success mb-3">
                <div class="card-header">Total Pemasukan</div>
                <div class="card-body">
                    <h5 class="card-title">Rp {{ number_format($totalPemasukan, 2) }}</h5>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card text-white bg-danger mb-3">
                <div class="card-header">Total Pengeluaran</div>
                <div class="card-body">
                    <h5 class="card-title">Rp {{ number_format($totalPengeluaran, 2) }}</h5>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card text-white bg-info mb-3">
                <div class="card-header">Saldo</div>
                <div class="card-body">
                    <h5 class="card-title">Rp {{ number_format($saldo, 2) }}</h5>
                </div>
            </div>
        </div>
    </div>

    <!-- Row for Charts -->
    <div class="row d-flex justify-content-center mb-4">
        <div class="col-md-6 mb-3">
            <div class="card">
                <div class="card-header">Pemasukan</div>
                <div class="card-body">
                    <canvas id="pemasukanChart" style="max-width: 100%; max-height: 300px;"></canvas> <!-- Adjust size -->
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <div class="card">
                <div class="card-header">Pengeluaran</div>
                <div class="card-body">
                    <canvas id="pengeluaranChart" style="max-width: 100%; max-height: 300px;"></canvas> <!-- Adjust size -->
                </div>
            </div>
        </div>
    </div>

    <!-- Row for Comparison Chart -->
    <div class="row d-flex justify-content-center mb-4">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Perbandingan Pemasukan dan Pengeluaran</div>
                <div class="card-body">
                    <canvas id="perbandinganChart" style="max-width: 100%; max-height: 400px;"></canvas> <!-- Adjust size -->
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Data for the charts
    const pemasukanData = {
        labels: {!! json_encode($kategoriLabelsPemasukan) !!},
        datasets: [{
            label: 'Pemasukan',
            data: {!! json_encode($pemasukanPerKategori->values()) !!},
            backgroundColor: {!! json_encode(array_map(fn($index) => "rgba(75, 192, 192, 0.6)", range(0, count($kategoriLabelsPemasukan) - 1))) !!},
            borderColor: 'rgba(75, 192, 192, 1)',
            borderWidth: 1
        }]
    };

    const pengeluaranData = {
        labels: {!! json_encode($kategoriLabelsPengeluaran) !!},
        datasets: [{
            label: 'Pengeluaran',
            data: {!! json_encode($pengeluaranPerKategori->values()) !!},
            backgroundColor: {!! json_encode(array_map(fn($index) => "rgba(255, 99, 132, 0.6)", range(0, count($kategoriLabelsPengeluaran) - 1))) !!},
            borderColor: 'rgba(255, 99, 132, 1)',
            borderWidth: 1
        }]
    };

    const pemasukanCtx = document.getElementById('pemasukanChart').getContext('2d');
    new Chart(pemasukanCtx, {
        type: 'doughnut',
        data: pemasukanData,
    });

    const pengeluaranCtx = document.getElementById('pengeluaranChart').getContext('2d');
    new Chart(pengeluaranCtx, {
        type: 'doughnut',
        data: pengeluaranData,
    });

    const perbandinganData = {
        labels: ['Pemasukan', 'Pengeluaran'],
        datasets: [{
            label: 'Perbandingan',
            data: [{{ $totalPemasukan }}, {{ $totalPengeluaran }}],
            backgroundColor: [
                'rgba(75, 192, 192, 0.6)',
                'rgba(255, 99, 132, 0.6)',
            ],
            borderColor: [
                'rgba(75, 192, 192, 1)',
                'rgba(255, 99, 132, 1)',
            ],
            borderWidth: 1
        }]
    };

    const perbandinganCtx = document.getElementById('perbandinganChart').getContext('2d');
    new Chart(perbandinganCtx, {
        type: 'doughnut',
        data: perbandinganData,
    });
</script>
@endsection
