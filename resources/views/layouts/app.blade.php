<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gradient-to-br from-[#ff9800] via-[#ffe082] to-white pt-24" style="background: linear-gradient(135deg, #ff9800 0%, #ffe082 100%); animation: gradientBG 8s ease-in-out infinite alternate;">
            <style>
            @keyframes gradientBG {
                0% { background-position: 0% 50%; }
                100% { background-position: 100% 50%; }
            }
            </style>
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
        <footer class="w-full text-center py-2 text-xs text-gray-600 opacity-80 font-poppins" style="background: linear-gradient(90deg, #ff9800cc 0%, #ffe082cc 100%); letter-spacing:0.5px;">
            Project Created By Yoga Pratamaa | Unisnu Jepara 2025
        </footer>
    </body>
</html>
