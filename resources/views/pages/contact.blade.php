@extends('layouts.app')

@section('title', 'Contact - Kuliner Palembang')

@section('content')

<section class="contact-section">
    <div class="text-center mb-5">
        <h2 class="fw-bold contact-title display-6">Hubungi Kami</h2>
        <p class="mt-3 contact-subtitle display-7">Kami siap memenuhi pesanan Anda!</p>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="contact-card shadow-lg mb-4">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item contact-item">
                        <span class="icon">📍</span>
                        <strong>Alamat:</strong> Jl. Sukarela, Palembang
                    </li>
                    <li class="list-group-item contact-item">
                        <span class="icon">📞</span>
                        <strong>Telepon:</strong> 0813-1289-4129
                    </li>
                    <li class="list-group-item contact-item">
                        <span class="icon">💬</span>
                        <strong>WhatsApp:</strong> 
                        <a href="https://wa.me/6281312894129" target="_blank">Chat Sekarang</a>
                    </li>
                    <li class="list-group-item contact-item">
                        <span class="icon">📧</span>
                        <strong>Email:</strong> info@KulinerPalembang.id
                    </li>
                </ul>
            </div>

            <div class="map-wrapper shadow-lg">
                <div class="ratio ratio-16x9">
                   <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3984.6073389747035!2d104.7290006752931!3d-2.928654297047667!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e3b741287734e51%3A0xd1b00270181211ae!2sKomplek%20Kasturi%20Land!5e0!3m2!1sid!2sid!4v1766079901604!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>

        </div>
    </div>
</section>

<style>
   .contact-section {
     background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), 
                url('{{ asset("storage/images/songket.jpeg") }}') center/cover no-repeat fixed;

    /* Full width */
    width: 100vw;
    min-height: 100vh;

    /* Force keluar dari container */
    margin-left: calc(50% - 50vw);
    margin-right: calc(50% - 50vw);

    /* Fix pemotongan Bootstrap */
    display: block;
    overflow: hidden;

    padding: 80px 0;
    position: relative;
    color: #fff;
    margin-bottom: -2vw;
}

.contact-card {
    background: rgba(255, 255, 255, 0.1);
    border: 1px solid rgba(255,255,255,0.25);
    border-radius: 18px;
    padding: 25px;
    backdrop-filter: blur(8px);
    transition: 0.35s ease;
    box-shadow: 0 0 25px rgba(255,255,255,0.2);
}

.contact-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 0 45px rgba(255,255,255,0.35);
}

.contact-item {
    padding: 16px 0;
    border-bottom: 1px solid rgba(255,255,255,0.25);
     background: transparent !important;
    color: #fff;
}

.contact-item a {
    color: #ffd966;
    font-weight: 600;
}


.contact-item:last-child {
    border-bottom: none;
}

.icon {
    font-size: 1.7rem;
    margin-right: 12px;
}

.map-wrapper {
    border-radius: 15px;
    overflow: hidden;
    margin-top: 20px;
    box-shadow: 0 0 35px rgba(255, 255, 255, 0.25);
}

@media (max-width:991px) {
    .contact-section{
        margin-bottom: -4vw;
    }

    
}

</style>

@endsection
