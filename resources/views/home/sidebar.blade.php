<div class="bg-dark border-right d-flex flex-column" id="sidebar-wrapper">
    <div class="sidebar-heading text-center">Test Laravel</div>
    <div class="list-group list-group-flush flex-grow-1">
        <a href="{{ route('home') }}" class="list-group-item list-group-item-action bg-dark text-white">
            <i class="fas fa-tachometer-alt"></i> Dashboard
        </a>
        <a href="{{ route('transaksi.index') }}" class="list-group-item list-group-item-action bg-dark text-white">
            <i class="fas fa-shopping-cart"></i> Transaksi
        </a>
        <a href="{{ route('tipe.index') }}" class="list-group-item list-group-item-action bg-dark text-white">
            <i class="fas fa-tags"></i> Tipe
        </a>
        <a href="{{ route('kategori.index') }}" class="list-group-item list-group-item-action bg-dark text-white">
            <i class="fas fa-list"></i> Kategori
        </a>
    </div>
</div>
