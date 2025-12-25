@extends('layouts.app')

@section('title', 'Admin - Menu')

@section('content')
<div class="dashboard-hero">
    <div class="container">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="fw-bold text-white shadow-sm">🍽️ Data Menu</h3>
            <a href="{{ route('admin.menu.create') }}" class="btn btn-warning fw-bold rounded-pill px-4 shadow">
                + Tambah Menu
            </a>
        </div>

        <div class="glass-card">
            <div class="table-responsive">
                <table class="table table-borderless align-middle text-white mb-0">
                    <thead>
                        <tr class="border-bottom border-light border-opacity-25">
                            <th>No</th>
                            <th>Gambar</th>
                            <th>Nama</th>
                            <th>Harga</th>
                            <th width="170">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($menus as $menu)
                        <tr class="table-row">
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                <img src="{{ asset('storage/'.$menu->image) }}" class="menu-thumb shadow">
                            </td>
                            <td class="fw-semibold">{{ $menu->name }}</td>
                            <td class="text-warning fw-bold">
                                Rp {{ number_format($menu->price,0,',','.') }}
                            </td>
                            <td>
                                <div class="d-flex gap-2">
                                    <a href="{{ route('admin.menu.edit', $menu->id) }}" class="btn btn-sm btn-primary rounded-pill px-3">
                                        Edit
                                    </a>
                                    <form action="{{ route('admin.menu.destroy', $menu->id) }}" method="POST" onsubmit="return confirm('Hapus menu ini?')">
                                        @csrf @method('DELETE')
                                        <button class="btn btn-sm btn-danger rounded-pill px-3">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center py-5">Data menu masih kosong.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<style>
/* Pembungkus Fullscreen */
.dashboard-hero {
    background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), 
                url('{{ asset("storage/images/songket.jpeg") }}') center/cover no-repeat fixed;
    min-height: 100vh;
    padding: 40px 0 100px 0;
    margin-top: 0; /* Menempel ke navbar */
    margin-left: calc(50% - 50vw);
    margin-right: calc(50% - 50vw);
      margin-bottom: -2vw
}

.glass-card {
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(15px);
    -webkit-backdrop-filter: blur(15px);
    border: 1px solid rgba(255, 255, 255, 0.2);
    border-radius: 25px;
    padding: 30px;
    box-shadow: 0 20px 40px rgba(0,0,0,0.4);
}

.table-row {
    transition: 0.3s;
    border-bottom: 1px solid rgba(255,255,255,0.05);
}

.table-row:hover {
    background: rgba(255,255,255,0.1);
    transform: scale(1.01);
}

.menu-thumb {
    width: 65px;
    height: 65px;
    object-fit: cover;
    border-radius: 15px;
    border: 2px solid rgba(255,255,255,0.2);
}
</style>
@endsection