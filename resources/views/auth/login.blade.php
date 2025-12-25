<x-guest-layout>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;800&display=swap');

        /* 1. Full Background Layer */
        .login-page-wrapper {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            z-index: 9999;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.7)), 
                        url('{{ asset("storage/images/songket.jpeg") }}') center/cover no-repeat fixed;
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        /* 2. Glassmorphism Card Premium */
        .auth-card {
            width: 100%;
            max-width: 420px;
            background: rgba(255, 255, 255, 0.92);
            padding: 50px 40px;
            border-radius: 30px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.4);
            position: relative;
            overflow: hidden;
        }

        /* Garis aksen emas di atas kartu */
        .auth-card::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
            background: linear-gradient(90deg, #ffc107, #ff8f00);
        }

        .auth-header h3 {
            font-weight: 800;
            color: #1a1a1a;
            font-size: 2rem;
            margin-bottom: 8px;
        }

        /* 3. Input Styling */
        .input-group-custom {
            margin-bottom: 24px;
        }

        .label-clean {
            font-size: 0.85rem;
            font-weight: 700;
            color: #333;
            margin-bottom: 10px;
            display: block;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .form-input {
            width: 100%;
            padding: 14px 20px;
            border-radius: 15px;
            border: 2px solid #eee;
            background: #f9f9f9;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            font-size: 1rem;
            color: #1a1a1a;
        }

        .form-input:focus {
            border-color: #ffc107;
            background: #fff;
            box-shadow: 0 10px 15px -3px rgba(255, 193, 7, 0.2);
            outline: none;
            transform: translateY(-2px);
        }

        /* 4. Button & Links */
        .btn-submit {
            width: 100%;
            padding: 16px;
            background: linear-gradient(135deg, #ffc107, #ff9800);
            color: #000;
            border: none;
            border-radius: 15px;
            font-weight: 800;
            font-size: 1.1rem;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 10px 20px rgba(255, 152, 0, 0.3);
        }

        .btn-submit:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 25px rgba(255, 152, 0, 0.4);
            filter: brightness(1.1);
        }

        .links-area {
            display: flex;
            justify-content: space-between;
            margin-top: 25px;
        }

        .links-area a, .links-area span {
            font-size: 0.85rem;
            color: #666;
            text-decoration: none;
            font-weight: 600;
        }

        .links-area a:hover {
            color: #ff9800;
        }

        /* Hide Breeze default layout elements */
        .min-h-screen > div:first-child { display: none !important; }

        /* Cursor global */
        .login-page-wrapper {
            cursor: url('{{ asset("storage/images/13.png") }}')  24 24, auto !important;
        }

        /* Pastikan input & button ikut */
        .login-page-wrapper input,
        .login-page-wrapper button,
        .login-page-wrapper label,
        .login-page-wrapper a {
             cursor: url('{{ asset("storage/images/13.png") }}')  32 32, auto !important;
        }

    </style>

    <div class="login-page-wrapper">
        <div class="auth-card">
            
            <div class="auth-header text-center mb-5">
                <h3>Admin Login</h3>
                <p class="text-muted">Selamat datang kembali, Admin!</p>
            </div>

            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="input-group-custom">
                    <label class="label-clean">Alamat Email</label>
                    <input type="email" name="email" class="form-input" 
                           placeholder="admin@palembang.com" value="{{ old('email') }}" 
                           required autofocus>
                </div>

                <div class="input-group-custom">
                    <label class="label-clean">Kata Sandi</label>
                    <input type="password" name="password" class="form-input" 
                           placeholder="••••••••" required>
                </div>

                <div class="links-area mb-4">
                    <label class="d-flex align-items-center gap-2 cursor-pointer">
                        <input type="checkbox" name="remember" style="accent-color: #ffc107;">
                        <span>Ingat saya</span>
                    </label>
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}">Lupa Password?</a>
                    @endif
                </div>

                <button type="submit" class="btn-submit">
                    MASUK SEKARANG
                </button>

            </form>
        </div>
    </div>
</x-guest-layout>