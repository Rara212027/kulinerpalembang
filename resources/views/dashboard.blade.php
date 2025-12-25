@extends('layouts.app')

@section('title', 'Admin - Menu')

@section('content')
<div class="container py-5">

    <!-- HEADER -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-bold text-white">🍽️ Data Menu</h3>
        <a href="{{ route('admin.menu.create') }}" class="btn btn-glass fw-bold">
            + Tambah Menu
        </a>
    </div>

    <!-- GLASS CARD -->
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
                            <img src="{{ asset('storage/'.$menu->image) }}"
                                 class="menu-thumb">
                        </td>
                        <td class="fw-semibold">{{ $menu->name }}</td>
                        <td class="text-warning fw-bold">
                            Rp {{ number_format($menu->price,0,',','.') }}
                        </td>
                        <td>
                            <a href="{{ route('admin.menu.edit', $menu->id) }}"
                               class="btn btn-sm btn-edit">
                                Edit
                            </a>

                            <form action="{{ route('admin.menu.destroy', $menu->id) }}"
                                  method="POST"
                                  class="d-inline"
                                  onsubmit="return confirm('Hapus menu ini?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-delete">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center text-muted py-4">
                            Data menu kosong
                        </td>
                    </tr>
                    @endforelse

                </tbody>
            </table>

        </div>
    </div>

</div>

<!-- ===============================
 GLASS STYLE
================================ -->
<style>
body{
    background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), 
                url('{{ asset("storage/images/songket.jpeg") }}') center/cover no-repeat fixed;
    min-height: 100vh;
    padding: 40px 0 100px 0;
    margin-top: 0; /* Menempel ke navbar */
    margin-left: calc(50% - 50vw);
    margin-right: calc(50% - 50vw);
      margin-bottom: -2vw;
      height: 1vh;
   
}

.glass-card{
    background: rgba(255,255,255,0.12);
    backdrop-filter: blur(14px);
    -webkit-backdrop-filter: blur(14px);
    border-radius: 22px;
    border: 1px solid rgba(255,255,255,0.25);
    box-shadow: 0 25px 45px rgba(0,0,0,.35);
    padding: 25px;
    
}

/* table */
.table-row{
    transition:.3s;
}
.table-row:hover{
    background: rgba(255,255,255,0.08);
}

/* image */
.menu-thumb{
    width:70px;
    height:70px;
    object-fit:cover;
    border-radius:12px;
    box-shadow:0 8px 20px rgba(0,0,0,.35);
}

/* buttons */
.btn-glass{
    background: rgba(255,193,7,.9);
    border-radius:30px;
    padding:10px 22px;
    color:#000;
    box-shadow:0 10px 25px rgba(0,0,0,.3);
    transition:.3s;
}
.btn-glass:hover{
    transform: translateY(-2px) scale(1.04);
}

.btn-edit{
    background: rgba(13,110,253,.9);
    color:#fff;
    border-radius:20px;
    padding:4px 14px;
}
.btn-delete{
    background: rgba(220,53,69,.9);
    color:#fff;
    border-radius:20px;
    padding:4px 14px;
}
</style>

@endsection
