@extends('layouts.app')

@section('title', 'Keranjang Belanja')

@section('content')

<section class="cart-section">
    <div class="container">
        <div class="col-md-8 col-lg-6 mx-auto glass-card">
            
            <h3 class="fw-bold text-white mb-4 text-center">
                🛒 Keranjang Belanja
            </h3>

            <div class="cart-items-wrapper">
                @forelse($cart as $id => $item)
                    <div class="cart-item-row d-flex align-items-center justify-content-between text-white py-3">
                        <div class="d-flex align-items-center">
                            <div class="img-wrapper me-3">
                                <img src="{{ asset('storage/'.$item['image']) }}" 
                                     alt="{{ $item['name'] }}"
                                     class="rounded shadow-sm">
                            </div>

                            <div>
                                <h6 class="fw-bold mb-1 text-capitalize">{{ $item['name'] }}</h6>
                                <p class="mb-0 text-white-50 small">
                                    {{ $item['qty'] }} x <span class="text-warning">Rp {{ number_format($item['price'], 0, ',', '.') }}</span>
                                </p>
                            </div>
                        </div>

                        <div class="action-area">
                           <form action="{{ route('cart.remove', ['id' => $id]) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn-delete" title="Hapus Item">
                                    <i class="bi bi-trash"></i> Hapus
                                </button>
                            </form>
                        </div>
                    </div>
                @empty
                    <div class="text-center py-5">
                        <span class="display-1">😢</span>
                        <p class="text-white-50 mt-3">Wah, keranjangmu masih kosong nih.</p>
                        <a href="{{ url('/menu') }}" class="btn btn-outline-light btn-sm mt-2">Cari Makanan</a>
                    </div>
                @endforelse
            </div>

            @if(!empty($cart))
                <hr class="text-white-50 my-4">
                
                <div class="d-flex justify-content-between align-items-center mb-4 text-white">
                    <span class="h5 mb-0">Total Estimasi:</span>
                    <span class="h4 fw-bold text-warning mb-0">
                        Rp {{ number_format(array_sum(array_map(fn($item) => $item['price'] * $item['qty'], $cart)), 0, ',', '.') }}
                    </span>
                </div>

                <div class="d-grid gap-2">
                    <a href="{{ route('cart.checkout') }}" class="btn btn-checkout py-3 fw-bold">
                        Lanjutkan ke Checkout <i class="bi bi-arrow-right ms-2"></i>
                    </a>
                    <a href="{{ url('/menu') }}" class="btn btn-link text-white-50 btn-sm text-decoration-none">
                        Tambah Menu Lainnya
                    </a>
                </div>
            @endif

        </div>
    </div>
</section>

<style>
/* Background Section */
.cart-section {
    width: 100vw;
    min-height: 100vh;
    margin-left: calc(50% - 50vw);
    padding: 100px 0;
    background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)),
                url('{{ asset("storage/images/songket.jpeg") }}') center/cover no-repeat fixed;
    display: flex;
    align-items: center;
    margin-bottom: -3vh;
}

/* Glassmorphism Card */
.glass-card {
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(15px);
    -webkit-backdrop-filter: blur(15px);
    border: 1px solid rgba(255, 255, 255, 0.2);
    border-radius: 25px;
    padding: 40px;
    box-shadow: 0 25px 50px rgba(0,0,0,0.5);
}

/* Item Row Style */
.cart-item-row {
    border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    transition: all 0.3s ease;
}

.cart-item-row:last-child {
    border-bottom: none;
}

.img-wrapper img {
    width: 70px;
    height: 70px;
    object-fit: cover;
    border: 2px solid rgba(255,255,255,0.2);
}

/* Custom Buttons */
.btn-delete {
    background: rgba(220, 53, 69, 0.2);
    color: #ff8a8a;
    border: 1px solid rgba(220, 53, 69, 0.4);
    padding: 5px 12px;
    border-radius: 8px;
    font-size: 0.85rem;
    transition: 0.3s;
}

.btn-delete:hover {
    background: #dc3545;
    color: white;
}

.btn-checkout {
    background: #ffc107;
    color: #000;
    border-radius: 12px;
    transition: 0.3s;
    box-shadow: 0 10px 20px rgba(255, 193, 7, 0.3);
}

.btn-checkout:hover {
    background: #e0a800;
    transform: translateY(-2px);
    box-shadow: 0 15px 25px rgba(255, 193, 7, 0.4);
}
</style>

@endsection