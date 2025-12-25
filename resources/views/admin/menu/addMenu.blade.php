@extends('layouts.app')

@section('title', 'Tambah Menu')

@section('content')
<div class="container py-5">

    <div class="col-md-7 mx-auto">

        <!-- GLASS CARD -->
        <div class="glass-card">
            <div class="glass-body">

                <h4 class="fw-bold text-white mb-4">
                    ➕ Tambah Menu Baru
                </h4>

                <form action="{{ route('admin.menu.store') }}"
                      method="POST"
                      enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label text-white">Nama Menu</label>
                        <input type="text"
                               name="name"
                               class="form-control glass-input"
                               placeholder="Contoh: Pempek Kapal Selam"
                               required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label text-white">Deskripsi</label>
                        <textarea name="description"
                                  rows="3"
                                  class="form-control glass-input"
                                  placeholder="Deskripsi menu..."></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label text-white">Harga</label>
                        <input type="number"
                               name="price"
                               class="form-control glass-input"
                               placeholder="25000"
                               required>
                    </div>

                    <div class="mb-4">
                        <label class="form-label text-white">Gambar Menu</label>
                        <input type="file"
                               name="image"
                               class="form-control glass-input"
                               required>
                    </div>

                    <div class="d-flex justify-content-end gap-2">
                        <a href="{{ route('admin.menu.index') }}"
                           class="btn btn-glass-secondary">
                            Kembali
                        </a>
                        <button class="btn btn-glass-primary fw-bold">
                            Simpan Menu
                        </button>
                    </div>

                </form>

            </div>
        </div>

    </div>

</div>

<!-- ===============================
 GLASS FORM STYLE
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
   


/* glass card */
.glass-card{
    background: rgba(255,255,255,0.12);
    backdrop-filter: blur(15px);
    -webkit-backdrop-filter: blur(15px);
    border-radius: 22px;
    border: 1px solid rgba(255,255,255,0.25);
    box-shadow: 0 30px 50px rgba(0,0,0,.4);
    padding: 30px;
}

/* input */
.glass-input{
    background: rgba(255,255,255,0.15);
    border: 1px solid rgba(255,255,255,0.3);
    color: #fff;
    border-radius: 14px;
    padding: 12px;
}

.glass-input::placeholder{
    color: rgba(255,255,255,.7);
}

.glass-input:focus{
    background: rgba(255,255,255,0.2);
    color: #fff;
    box-shadow: none;
    border-color: #ffc107;
}

/* buttons */
.btn-glass-primary{
    background: rgba(255,193,7,.95);
    color: #000;
    border-radius: 30px;
    padding: 10px 26px;
    box-shadow: 0 10px 25px rgba(0,0,0,.35);
    transition:.3s;
}

.btn-glass-primary:hover{
    transform: translateY(-2px) scale(1.05);
}

.btn-glass-secondary{
    background: rgba(255,255,255,.25);
    color: #fff;
    border-radius: 30px;
    padding: 10px 22px;
    transition:.3s;
}

.btn-glass-secondary:hover{
    background: rgba(255,255,255,.35);
}
</style>

@endsection
