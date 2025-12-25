@extends('layouts.app')

@section('title', 'Menu - Kuliner Palembang')

@section('content')

<section class="menu-section">

    <div class="container text-center text-white mb-5">
        <h1 class="fw-bold display-5">Menu Khas Palembang</h1>
        <p class="lead mt-2">
            Beragam pilihan kuliner autentik Palembang dengan cita rasa asli
        </p>
    </div>

    <div class="container">
        <div class="row g-4">

            @forelse($menus as $menu)
            <div class="col-md-3 col-sm-6">
                <div class="menu-card">

                    <!-- IMAGE + HOVER -->
                    <div class="menu-img-wrapper">
                        <img src="{{ asset('storage/'.$menu->image) }}"
                             alt="{{ $menu->name }}"
                             class="menu-img">

                        <div class="menu-overlay">
                            {{-- UBAH: Gunakan button biasa, bukan form submit --}}
                            <button type="button" 
                                    class="btn btn-cart add-to-cart" 
                                    data-url="{{ route('cart.add', $menu->id) }}">
                                🛒 Tambah ke Keranjang
                            </button>
                        </div>
                    </div>

                    <!-- BODY -->
                    <div class="menu-body">
                        <h5 class="fw-bold">{{ $menu->name }}</h5>

                        <p class="small  mb-2">
                            {{ Str::limit($menu->description, 70) }}
                        </p>

                        <span class="price">
                            Rp {{ number_format($menu->price,0,',','.') }}
                        </span>
                    </div>

                </div>
            </div>
            @empty
            <div class="col-12 text-center">
                <p class="text-white-50">Menu belum tersedia.</p>
            </div>
            @endforelse

        </div>
    </div>

</section>

<style>
/* ===============================
   BACKGROUND SECTION
================================ */
.menu-section{
    width:100vw;
    margin-bottom: -5vh;
    margin-left:calc(50% - 50vw);
    padding:100px 0;
    background:linear-gradient(
        rgba(0,0,0,.65),
        rgba(0,0,0,.65)
    ),
    url('{{ asset("storage/images/songket.jpeg") }}') center/cover no-repeat;
}

/* ===============================
   CARD
================================ */
.menu-card{
    position:relative;
    border-radius:20px;
    overflow:hidden;
    box-shadow:0 12px 30px rgba(0,0,0,.25);
    transition:.35s;
}

.menu-card::before{
    content:'';
    position:absolute;
    inset:0;
    background:rgba(255,255,255,.55);
    backdrop-filter: blur(8px);
    z-index:0;
}

/* Pastikan isi card di atas overlay */
.menu-card *{
    position:relative;
    z-index:1;
}


.menu-card:hover{
    transform:translateY(-10px);
    box-shadow:0 18px 40px rgba(0,0,0,.35);
}

/* ===============================
   IMAGE + OVERLAY
================================ */
.menu-img-wrapper{
    position:relative;
    overflow:hidden;
}

.menu-img{
    width:100%;
    height:200px;
    object-fit:cover;
}

.menu-overlay{
    position:absolute;
    inset:0;
    background:rgba(0,0,0,.55);
    display:flex;
    align-items:center;
    justify-content:center;
    opacity:0;
    transition:.35s;
}

.menu-card:hover .menu-overlay{
    opacity:1;
}

/* ===============================
   BUTTON CART
================================ */
.btn-cart{
    background:#ffc107;
    color:#000;
    font-weight:700;
    padding:10px 22px;
    border-radius:30px;
    text-decoration:none;
    transition:.3s;
}

.btn-cart:hover{
    background:#ffb000;
    transform:scale(1.08);
}

/* ===============================
   BODY
================================ */
.menu-body{
    padding:18px;
    text-align:left;
    color: white;
}

.menu-body .small{
    
    text-align:left;
    color: white;
}

.price{
    font-weight:700;
    color:#bb3e03;
    font-size:1.05rem;
}

/* ===============================
   MOBILE
================================ */
@media (max-width:768px){
    .menu-overlay{
        opacity:1;
        background:linear-gradient(
            to top,
            rgba(0,0,0,.65),
            rgba(0,0,0,.15)
        );
    }
}
</style>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $('.add-to-cart').on('click', function(e) {
        e.preventDefault();
        
        let button = $(this);
        let url = button.data('url');

        // Efek loading sederhana pada tombol
        button.prop('disabled', true).html('<span class="spinner-border spinner-border-sm"></span>');

        $.ajax({
            url: url,
            method: "POST",
            data: {
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                if(response.status === 'success') {
                    // 1. Update angka di Navbar
                    $('#cart-count').text(response.cart_count);

                    // 2. Notifikasi Toast (Melayang di pojok)
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 2000,
                        timerProgressBar: true
                    });

                    Toast.fire({
                        icon: 'success',
                        title: response.message
                    });
                }
            },
            error: function() {
                Swal.fire('Oops!', 'Gagal menambah item.', 'error');
            },
            complete: function() {
                // Kembalikan tombol ke semula
                button.prop('disabled', false).html('<i class="bi bi-plus-lg"></i> Tambah');
            }

            
        });
    });
});
</script>

@endsection
