<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard Admin') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="relative max-w-4xl mx-auto bg-gradient-to-br from-[#ff9800]/90 via-[#fffde7]/80 to-white/95 backdrop-blur-md rounded-2xl shadow-2xl border border-orange-300 px-8 py-8 overflow-hidden">
            <!-- SVG pattern sudut kanan atas -->
            <svg class="absolute top-0 right-0 w-24 h-24 opacity-20" viewBox="0 0 100 100">
                <circle cx="20" cy="20" r="8" fill="#ffe082"/>
                <circle cx="60" cy="40" r="6" fill="#ff9800"/>
                <circle cx="80" cy="80" r="10" fill="#fffde7"/>
            </svg>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                <!-- Card Manajemen User -->
                <div class="bg-gradient-to-br from-[#ff9800]/80 via-[#ffe082]/70 to-white/90 rounded-2xl shadow-xl p-6 flex flex-col items-center border border-orange-200 transition-all duration-300 transform hover:scale-105 hover:shadow-2xl animate-fade-in">
                    <div class="text-xl font-bold text-orange-600 mb-2">Manajemen User</div>
                    <div class="text-gray-700 text-sm mb-4 text-center">Lihat, rekap, dan hapus akun user (admin & siswa) yang terdaftar di sistem.</div>
                    <a href="{{ route('rekap.user') }}" class="px-4 py-2 bg-orange-500 text-white rounded hover:bg-orange-600 font-semibold shadow">Buka</a>
                </div>
                <!-- Card Rekap Absen Siswa -->
                <div class="bg-gradient-to-br from-[#ffe082]/80 via-[#ff9800]/70 to-white/90 rounded-2xl shadow-xl p-6 flex flex-col items-center border border-yellow-300 transition-all duration-300 transform hover:scale-105 hover:shadow-2xl animate-fade-in" style="animation-delay:0.15s;">
                    <div class="text-xl font-bold text-yellow-700 mb-2">Rekap Absen Siswa</div>
                    <div class="text-gray-700 text-sm mb-4 text-center">Pantau dan cetak rekap absensi setiap siswa secara detail dan rapi.</div>
                    <a href="{{ route('rekap.absen.user.list') }}" class="px-4 py-2 bg-yellow-500 text-white rounded hover:bg-yellow-600 font-semibold shadow">Buka</a>
                </div>
                <!-- Card Kelola Jadwal Kelas -->
                <div class="bg-gradient-to-br from-green-400/80 via-green-200/70 to-white/90 rounded-2xl shadow-xl p-6 flex flex-col items-center border border-green-200 transition-all duration-300 transform hover:scale-105 hover:shadow-2xl animate-fade-in" style="animation-delay:0.3s;">
                    <div class="text-xl font-bold text-green-700 mb-2">Kelola Jadwal Kelas</div>
                    <div class="text-gray-700 text-sm mb-4 text-center">Tambah, edit, dan hapus jadwal kelas yang berlaku untuk siswa.</div>
                    <a href="{{ route('jadwal.index') }}" class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700 font-semibold shadow">Buka</a>
                </div>
            </div>
            <style>
            @keyframes fadeIn {
                0% { opacity: 0; transform: translateY(40px) scale(0.98); }
                80% { opacity: 1; transform: translateY(-8px) scale(1.03); }
                100% { opacity: 1; transform: translateY(0) scale(1); }
            }
            .animate-fade-in {
                opacity: 0;
                animation: fadeIn 1.1s cubic-bezier(.68,-0.55,.27,1.55) 0.5s forwards;
            }
            </style>
        </div>
    </div>
</x-app-layout> 