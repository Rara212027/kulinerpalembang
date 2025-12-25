@extends('layouts.app')

@section('title','Checkout')

@section('content')

<section class="checkout-section">

    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-6">
                <div class="glass-card text-white">

                    <h3 class="fw-bold mb-4 text-center">
                        Checkout Pesanan
                    </h3>

                    <form action="{{ route('cart.process') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label fw-semibold">
                                Nama Lengkap
                            </label>
                            <input type="text"
                                   name="name"
                                   class="form-control"
                                   placeholder="Nama Anda"
                                   required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">
                                No WhatsApp
                            </label>
                            <input type="text"
                                   name="phone"
                                   class="form-control"
                                   placeholder="08xxxxxxxxxx"
                                   required>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-semibold">
                                Alamat Lengkap
                            </label>
                            <textarea name="address"
                                      class="form-control"
                                      rows="3"
                                      placeholder="Alamat pengantaran"
                                      required></textarea>
                        </div>

                        <button type="submit"
                                class="btn btn-whatsapp w-100">
                            Kirim Pesanan via WhatsApp
                        </button>
                    </form>

                </div>
            </div>

        </div>
    </div>

</section>

<style>
/* ===============================
   SECTION
================================ */
.checkout-section{
    width:100vw;
    margin-left:calc(50% - 50vw);
    padding:120px 0;
    background:linear-gradient(
        rgba(0,0,0,.65),
        rgba(0,0,0,.75)
    ),
    url('{{ asset("storage/images/songket.jpeg") }}') center/cover no-repeat;
    margin-bottom: -3vh;
}

/* ===============================
   GLASS CARD
================================ */
.glass-card{
    background:rgba(255,255,255,.22);
    backdrop-filter: blur(14px);
    -webkit-backdrop-filter: blur(14px);
    border-radius:24px;
    padding:40px 35px;
    box-shadow:0 25px 55px rgba(0,0,0,.45);
}

/* ===============================
   FORM
================================ */
.form-control{
    border-radius:14px;
    padding:12px 14px;
    border:none;
}

.form-control:focus{
    box-shadow:0 0 0 .15rem rgba(255,193,7,.4);
}

/* ===============================
   BUTTON
================================ */
.btn-whatsapp{
    background:#25D366;
    color:#fff;
    font-weight:700;
    padding:14px;
    border-radius:30px;
    transition:.3s;
}

.btn-whatsapp:hover{
    background:#1ebe5d;
    transform:translateY(-2px);
    box-shadow:0 10px 25px rgba(0,0,0,.35);
}
</style>

@endsection
