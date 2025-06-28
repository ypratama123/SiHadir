<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>SiHadir - Login</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <style>
            body {
                min-height: 100vh;
                background: linear-gradient(135deg, #ff9800 0%, #ffe082 100%);
                animation: gradientBG 8s ease-in-out infinite alternate;
            }
            @keyframes gradientBG {
                0% { background-position: 0% 50%; }
                100% { background-position: 100% 50%; }
            }
            .logo-sihadir {
                font-family: 'Figtree', sans-serif;
                font-size: 2.5rem;
                font-weight: bold;
                color: #ff9800;
                letter-spacing: 2px;
                text-shadow: 2px 2px 8px #fff17699;
                display: flex;
                align-items: center;
                gap: 0.5rem;
                opacity: 0;
                animation: logoFadeBounce 1.2s cubic-bezier(.68,-0.55,.27,1.55) 0.2s forwards;
            }
            @keyframes logoFadeBounce {
                0% { opacity: 0; transform: translateY(-40px) scale(0.8); }
                60% { opacity: 1; transform: translateY(10px) scale(1.1); }
                80% { transform: translateY(-5px) scale(0.95); }
                100% { opacity: 1; transform: translateY(0) scale(1); }
            }
            .bubble {
                position: absolute;
                border-radius: 50%;
                opacity: 0.13;
                animation: float 6s ease-in-out infinite alternate;
            }
            .bubble1 { width: 120px; height: 120px; left: 10%; top: 20%; background: #fffde7; animation-duration: 7s; }
            .bubble2 { width: 80px; height: 80px; right: 15%; top: 35%; background: #ffe082; animation-duration: 6s; }
            .bubble3 { width: 100px; height: 100px; left: 30%; bottom: 10%; background: #ffb300; animation-duration: 8s; }
            .bubble4 { width: 60px; height: 60px; right: 20%; bottom: 15%; background: #ff9800; animation-duration: 5.5s; }
            .bubble5 { width: 90px; height: 90px; left: 60%; top: 10%; background: #fffde7; animation-duration: 7.5s; }
            .bubble6 { width: 70px; height: 70px; right: 5%; bottom: 30%; background: #ffe082; animation-duration: 6.5s; }
            @keyframes float {
                0% { transform: translateY(0); }
                100% { transform: translateY(-30px); }
            }
            .register-top-right {
                position: absolute;
                top: 2rem;
                right: 2rem;
            }
            .login-card-animate {
                opacity: 0;
                transform: translateY(40px) scale(0.98);
                animation: cardFadeIn 1.1s cubic-bezier(.68,-0.55,.27,1.55) 0.5s forwards;
            }
            @keyframes cardFadeIn {
                0% { opacity: 0; transform: translateY(40px) scale(0.98); }
                80% { opacity: 1; transform: translateY(-8px) scale(1.03); }
                100% { opacity: 1; transform: translateY(0) scale(1); }
            }
        </style>
    </head>
    <body class="font-sans text-gray-900 antialiased relative overflow-hidden">
        <div class="bubble bubble1"></div>
        <div class="bubble bubble2"></div>
        <div class="bubble bubble3"></div>
        <div class="bubble bubble4"></div>
        <div class="bubble bubble5"></div>
        <div class="bubble bubble6"></div>
        <div class="register-top-right">
            @if (Route::has('register'))
                <a href="{{ route('register') }}" class="px-4 py-2 bg-orange-500 text-white rounded shadow hover:bg-yellow-500 transition">Register</a>
            @endif
        </div>
        <div class="min-h-screen flex flex-col justify-center items-center">
            <div class="mb-6">
                <span class="logo-sihadir">
                    <svg width="44" height="44" viewBox="0 0 44 44" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="22" cy="22" r="22" fill="#ff9800"/>
                        <text x="50%" y="58%" text-anchor="middle" fill="#fffde7" font-size="28" font-family="'Figtree', 'Segoe UI', Arial, sans-serif" font-weight="bold" dy=".3em" letter-spacing="2" style="font-style: italic;">S</text>
                    </svg>
                    SiHadir
                </span>
            </div>
            <div class="relative w-full sm:max-w-md px-6 py-8 bg-gradient-to-br from-[#ff9800]/90 via-[#fffde7]/80 to-white/95 backdrop-blur-md shadow-2xl border border-orange-300 rounded-2xl login-card-animate overflow-hidden" style="font-family: 'Poppins', 'Figtree', Arial, sans-serif;">
                <!-- SVG pattern sudut kanan atas -->
                <svg class="absolute top-0 right-0 w-24 h-24 opacity-20" viewBox="0 0 100 100">
                    <circle cx="20" cy="20" r="8" fill="#ffe082"/>
                    <circle cx="60" cy="40" r="6" fill="#ff9800"/>
                    <circle cx="80" cy="80" r="10" fill="#fffde7"/>
                </svg>
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
