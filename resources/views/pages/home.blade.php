@extends('layouts.app')

@section('title', 'Beranda - Kuliner Palembang')

@section('content')

<!-- ===============================
 HERO SECTION
================================ -->
<section class="hero-section">
    <div class="container">
        <div class="row align-items-center min-vh-75">

            <div class="col-md-6 text-white">
                <h1 class="hero-title">
                    Cita Rasa Asli <br>
                    <span>Kuliner Palembang</span>
                </h1>

                <p class="hero-subtitle">
                    Nikmati pempek, tekwan, model, dan kuliner khas Palembang
                    dengan rasa autentik & bahan berkualitas.
                </p>

                <a href="{{ url('/menu') }}" class="btn btn-hero mt-3 justify-content-center">
                    Lihat Menu
                </a>
            </div>

            <div class="col-md-6 text-center">
                <img src="{{ asset('storage/images/6.png') }}"
                     class="img-fluid hero-img" alt="Pempek Palembang">

                     <!-- UAP -->
                    <span class="steam steam-1"></span>
                    <span class="steam steam-2"></span>
                    <span class="steam steam-3"></span>
                    <span class="steam steam-4"></span>
                    <span class="steam steam-5"></span>
            </div>

        </div>
    </div>
    <div class="custom-shape-divider-bottom-1734455000">
     <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
         <path d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5,73.84-4.36,147.54,16.88,218.2,35.26,69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V120H0Z" opacity=".25" class="shape-fill"></path>
         <path d="M0,0V15.81C13,36.92,27.64,56.86,47.69,72.05,99.41,111.27,165,111,224.58,91.58c31.15-10.15,60.09-26.07,89.67-39.8,40.92-19,84.73-46,130.83-49.67,36.26-2.85,70.9,9.42,98.6,31.56,31.77,25.39,62.32,62,103.63,73,40.44,10.79,81.35-6.69,119.13-24.28s75.16-39,116.92-43.05c59.73-5.85,113.28,22.88,168.9,38.84,30.2,8.66,59,6.17,87.09-7.5V120H0Z" opacity=".5" class="shape-fill"></path>
         <path d="M0,0V5.63C149.93,59,314.09,71.32,475.83,42.57c43-7.64,84.23-20.12,127.61-26.46,59-8.63,112.48,12.24,165.56,35.41,52.81,23.06,104.14,47,163.18,47.51,64.39.51,115.84-29.17,166.45-56.1,32.42-17.25,64.21-36,101.37-43.91V120H0Z" class="shape-fill"></path>
     </svg>
    </div>
</section>

<style>

/* Uap dasar */
.steam {
    position: absolute;
    bottom: 70%;   /* keluar dari atas pempek */
    width: 22px;
    height: 50px;
    background: rgba(255,255,255,0.65);
    border-radius: 55%;
    filter: blur(3px);
    animation: steamUp 4s infinite ease-in-out;
    opacity: 0;
}

/* Posisi tiap uap */
.steam-1 {
    left: 75%;
    animation-delay: 0s;
}

.steam-2 {
    left: 70%;
    animation-delay: 1.2s;
}

.steam-3 {
    left: 65%;
    animation-delay: 2.4s;
}
.steam-4 {
    left: 60%;
    animation-delay: 1.2s;
}
.steam-5 {
    left: 55%;
    animation-delay: 2.4s;
}

/* Animasi naik */
@keyframes steamUp {
    0% {
        transform: translateY(0) scale(0.6);
        opacity: 0;
    }
    30% {
        opacity: 0.6;
    }
    100% {
        transform: translateY(-80px) scale(1.4);
        opacity: 0;
    }
}

.hero-section{
    width:100vw;
    height: 45vw;
    margin-left:calc(50% - 50vw);
    background: linear-gradient(
        rgba(0,0,0,0.55),
        rgba(0,0,0,0.65)
    ),
    url('{{ asset("storage/images/songket.jpeg") }}') center/cover no-repeat;
    padding:100px 0;
}

.hero-title{
    font-size:3rem;
    font-weight:800;
}

.hero-title span{
    color:#ffd966;
}

.hero-subtitle{
    font-size:1.1rem;
    opacity:0.95;
    margin-top:15px;
}

.btn-hero{
    background:#ffc107;
    color:#000;
    font-weight:600;
    border-radius:30px;
    padding:10px 28px;
    transition:.3s;
}

.btn-hero:hover{
      background:#ffb000;
    transform:translateY(-2px) scale(1.03);
    box-shadow:0 8px 20px rgba(0,0,0,.25);
}


/* Styling Divider */
.custom-shape-divider-bottom-1734455000 {
    position: absolute;
    bottom: -1px; /* Gunakan -1px untuk sedikit overlap agar tidak bocor */
    left: 0;
    width: 100%;
    overflow: hidden;
    line-height: 0;
    z-index: 10;
    transform: none; 
}

.custom-shape-divider-bottom-1734455000 svg {
    position: relative;
    display: block;
    width: calc(100% + 1.3px);
    height: 100px; 
}

.custom-shape-divider-bottom-1734455000 .shape-fill {
    /* Pastikan warna ini sama persis dengan bg-light (Section Keunggulan) */
    fill: #f8f9fa; 
}

/* Responsif untuk Mobile */
@media (max-width: 767px) {
    .custom-shape-divider-bottom-1734455000 svg {
    
        width: calc(100% + 1.3px);
        height: 50px;
        
        
    }

    .custom-shape-divider-bottom-1734455000{
            position: absolute;
            bottom: -1px; /* Gunakan -1px untuk sedikit overlap agar tidak bocor */
            left: 0;
            width: 100%;
            overflow: hidden;
            line-height: 0;
            z-index: 10;
            transform: none; 
            
   
    }

    .custom-shape-divider-bottom-1734455000 .shape-fill {
    /* Pastikan warna ini sama persis dengan bg-light (Section Keunggulan) */
    
    background-color: #f8f9fa; /* Warna yang sama dengan section bawah */
    margin-top: -1px;

    }
   
}

.hero-img{
    
    animation: swing 5s ease-in-out infinite;
}

/* Gerakan ayun */
@keyframes swing{
    0%{
        transform: translateX(0);
    }
    25%{
        transform: translateX(12px);
    }
    50%{
        transform: translateX(0);
    }
    75%{
        transform: translateX(-12px);
    }
    100%{
        transform: translateX(0);
    }
}

@keyframes swing{
    0%{ transform: translate(0,0); }
    25%{ transform: translate(12px,-3px); }
    50%{ transform: translate(0,0); }
    75%{ transform: translate(-12px,-3px); }
    100%{ transform: translate(0,0); }
}

 /* RESPONSIVE TABLET */

        @media (max-width:991px) {

            .hero-section{
                
                height: auto;
                min-height: auto;
                padding-bottom: 0;
                padding-top: 0px;
                margin-top: 0px;
            }

            .hero-title{
                font-size: 2.4rem;
                text-align: center;
                 margin-top: 5px;
            }

            .hero-subtitle{
                font-size: 1rem;
                text-align: center;
            }

            .hero-image{
                max-width: 340px;
            }

            .btn-hero{
                display: block;
                margin: 20px auto 0;
                justify-content: center;
            }

            .steam{
                width: 22px;
                height: 55px;
                bottom: 30%;
                filter: blur(3px);
            }

            
            /* Posisi tiap uap */
            .steam-1 { left: 55%; animation-delay: 0s; }
            .steam-2 { left: 50%; animation-delay: 1s; }
            .steam-3 { left: 65%; animation-delay: 2s; }
            .steam-4 { left: 30%; animation-delay: 1.4s; }
            .steam-5 { left: 25%; animation-delay: 2.6s; }

            /* Animasi uap */
            @keyframes steamUp {
                0% {
                    transform: translateY(0) scale(0.6);
                    opacity: 0;
                }
                30% {
                    opacity: 0.7;
                }
                100% {
                    transform: translateY(-100px) scale(1.5);
                    opacity: 0;
                }
            }
        }

        /* RESPONSIVE ANDROID */

        @media (max-width:767px) {
            .hero-section{
                padding: 70px 15px;
                height: auto;
                min-height: auto;
                padding-bottom: 0;
            }

            .hero-title{
                font-size: 2rem;
                text-align: center;
            }

            .hero-subtitle{
                font-size: .95rem;
                text-align: center;
            }

            .btn-hero{
                display: block;
                margin: 20px auto 0;
            }

            .hero-image{
                max-width: 260px;
                margin-top: 30px;
            }

            .steam{
                width: 22px;
                height: 45px;
                bottom: 40%;
                filter: blur(3px);
            }

            /* Posisi tiap uap */
            .steam-1 { left: 55%; animation-delay: 0s; }
            .steam-2 { left: 50%; animation-delay: 1s; }
            .steam-3 { left: 60%; animation-delay: 2s; }
            .steam-4 { left: 30%; animation-delay: 1.4s; }
            .steam-5 { left: 20%; animation-delay: 2.6s; }

            /* Animasi uap */
@keyframes steamUp {
    0% {
        transform: translateY(0) scale(0.6);
        opacity: 0;
    }
    30% {
        opacity: 0.7;
    }
    100% {
        transform: translateY(-100px) scale(1.5);
        opacity: 0;
    }
}
            
        }

</style>

<!-- ===============================
 KEUNGGULAN
================================ -->
<!-- ===============================
 KEUNGGULAN
================================ -->
<section class="py-5 bg-light">
    <div class="container-mine text-center">

        <h2 class="fw-bold mb-5 display-5">
            Kenapa <span class="text-danger">Kuliner Palembang?</span>
        </h2>

        <div class="row g-4">

            <div class="col-md-3">
                <div class="feature-card">
                    <img src="{{ asset('storage/images/1.png') }}">
                    <h5>Rasa Autentik</h5>
                    <p>Resep turun-temurun khas Palembang.</p>
                </div>
            </div>

            <div class="col-md-3">
                <div class="feature-card">
                    <img src="{{ asset('storage/images/3.png') }}">
                    <h5>Bahan Segar</h5>
                    <p>Ikan pilihan & rempah berkualitas.</p>
                </div>
            </div>

            <div class="col-md-3">
                <div class="feature-card">
                    <img src="{{ asset('storage/images/4.png') }}">
                    <h5>Halal & Higienis</h5>
                    <p>Proses bersih dan terjamin halal.</p>
                </div>
            </div>

            <div class="col-md-3">
                <div class="feature-card">
                    <img src="{{ asset('storage/images/5.png') }}">
                    <h5>Mudah Dipesan</h5>
                    <p>Bisa pesan online dengan cepat.</p>
                </div>
            </div>

        </div>
    </div>
</section>

<style>

.container-mine{
    fill:  #f8f9fa ;
}

.feature-card{
    position: relative;
    background: url('{{ asset("storage/images/4.jpeg") }}') center/cover no-repeat;
    padding: 40px 20px;
    border-radius: 18px;
    box-shadow: 0 10px 25px rgba(0,0,0,.1);
    transition: .3s ease;
    color: #fff;
    overflow: hidden;
    text-align: center;
}

.feature-card::before{
    content: '';
    position: absolute;
    inset: 0;
    background: rgba(0,0,0,.55);
}

.feature-card *{
    position: relative;
    z-index: 1;
}

.feature-card:hover{
    transform: translateY(-8px);
}

.feature-card img{
    width: 90px;
    margin: 0 auto 15px;
    display: block;
}

.feature-card h5{
    font-weight: 700;
    margin-bottom: 8px;
}

.feature-card p{
    font-size: 0.95rem;
    opacity: 0.9;
}

.feature-card:hover img{
    transform: scale(1.1);
    transition: .3s;
}

@media (max-width:767px) {
    .container-mine{
    fill:  #f8f9fa ;
}
}
</style>

<!-- ===============================
 MENU POPULER
================================ -->
<section class="menu-section">
    <div class="container text-center">

        <h2 class="fw-bold text-white mb-5 display-5">Menu Favorit</h2>

        <div class="row g-4 justify-content-center">

            @foreach($menus as $menu)
            <div class="col-md-3">
                <div class="menu-card">

                    <img src="{{ asset('storage/'.$menu->image) }}"
                         class="menu-img">

                    <div class="menu-body">
                        <h5>{{ $menu->name }}</h5>
                        <p class="small">
                            {{ Str::limit($menu->description, 60) }}
                        </p>
                        <div class="price">
                            Rp {{ number_format($menu->price,0,',','.') }}
                        </div>
                    </div>

                </div>
            </div>
            @endforeach

        </div>

        <a href="{{ url('/menu') }}" class="btn btn-me mt-4">
            Lihat Semua Menu
        </a>

    </div>
    <div class="custom-shape-divider-bottom-zigzag">
    <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
        <path d="M0,0V120H1200V0L1170,30L1140,0L1110,30L1080,0L1050,30L1020,0L990,30L960,0L930,30L900,0L870,30L840,0L810,30L780,0L750,30L720,0L690,30L660,0L630,30L600,0L570,30L540,0L510,30L480,0L450,30L420,0L390,30L360,0L330,30L300,0L270,30L240,0L210,30L180,0L150,30L120,0L90,30L60,0L30,30L0,0Z" class="shape-fill"></path>
    </svg>
</div>
</section>

<style>
.menu-section {
    position: relative; /* WAJIB ADA agar zigzag tahu batas bawah section ini */
    width: 100vw;
    min-height: 78vh; /* Gunakan min-height supaya konten tidak terpotong */
    margin-left: calc(50% - 50vw);
    background: url('{{ asset("storage/images/5.jpeg") }}') center/cover no-repeat;
    padding: 90px 0 130px 0; /* Tambah padding bawah agar tombol tidak tertutup zigzag */
    overflow: hidden; 
}

.menu-section h2 {
    text-shadow:
        0 0 6px rgba(0,0,0,0.7),
        0 0 18px rgba(255,215,0,0.4);
}


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
}

.menu-img{
    height:190px;
    width:100%;
    object-fit:cover;
}

.menu-body{
    padding:18px;
    color: #fff;
}
.menu-body .small{
    
    color: #fff;
}

.price{
    font-weight:700;
    color:#bb3e03;
}

.btn.btn-me{
    background:#ffc107;
    color:#000;
    font-weight:600;
    border-radius:30px;
    padding:10px 28px;
    transition:.3s;
}

.btn.btn-me:hover{
    background:#ffb000 !important;
    transform:translateY(-2px) scale(1.03);
    box-shadow:0 8px 20px rgba(0,0,0,.25);
}



.custom-shape-divider-bottom-zigzag {
    position: absolute;
    bottom: -1px; 
    left: 0;
    width: 100%;
    overflow: hidden;
    line-height: 0;
    z-index: 10; /* Pastikan di atas background */
}

.custom-shape-divider-bottom-zigzag svg {
    position: relative;
    display: block;
    width: calc(100% + 1.3px);
    height: 40px; /* Sesuaikan tinggi zigzag (jangan terlalu tinggi agar elegan) */
}

.custom-shape-divider-bottom-zigzag .shape-fill {
    fill: #ffd700; /* Warna ini harus sama dengan class .bg-light section bawahnya */
}

/* Penyesuaian untuk tampilan mobile */
@media (max-width: 767px) {
    .custom-shape-divider-bottom-zigzag svg {
        height: 20px;
    }
}
</style>

<!-- ===============================
 CTA
================================ -->
<section class="cta">
    <h2 class="fw-bold text-white mb-8 display-6">Siap Menikmati Kuliner Palembang?</h2>
    <p class="fw-bold text-white mb-6 display-7">Pesan sekarang dan rasakan kelezatan khas Palembang.</p>
    <a href="{{ url('/menu') }}" class="btn btn-mine btn-lg">
        Pesan Sekarang
    </a>
</section>

<style>
    .btn-mine{
    background:#ffc107;
    color:#000;
    font-weight:600;
    border-radius:30px;
    padding:10px 28px;
    transition:.3s;
}

.btn-mine:hover{
     background:#ffb000;
    transform:translateY(-2px) scale(1.03);
    box-shadow:0 8px 20px rgba(0,0,0,.25);
}
.cta{
    width:100vw;
    margin-left:calc(50% - 50vw);
    padding:90px 20px;
    text-align:center;
    color:#fff;
    background:linear-gradient(
        rgba(0,0,0,.6),
        rgba(0,0,0,.6)
    ),
    url('{{ asset("storage/images/songket.jpeg") }}') center/cover;
    margin-bottom: -2vw;
}

.cta h2{
    font-weight:800;
    margin-bottom:15px;
}

@media (max-width:991px) {
      .cta {
        margin-bottom: -5vw;
        
      }
}
@media (max-width:767px) {
      .cta {
        margin-bottom: -5vw;
        
      }
}


</style>

@endsection
