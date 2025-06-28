<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-orange-600 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="absolute top-0 left-0 w-full h-20 z-0" style="background: linear-gradient(90deg, #ff9800 0%, #ffe082 100%);"></div>
    <div class="py-12 relative" style="background: linear-gradient(135deg, #ff9800 0%, #ffe082 100%); min-height: 100vh; font-family: 'Poppins', 'Figtree', Arial, sans-serif;">
        <!-- Animated Bubbles -->
        <div class="bubble bubble1"></div>
        <div class="bubble bubble2"></div>
        <div class="bubble bubble3"></div>
        <div class="bubble bubble4"></div>
        <div class="bubble bubble5"></div>
        <div class="max-w-5xl mx-auto">
            <!-- Profile Section -->
            <div class="relative flex flex-col md:flex-row items-center gap-6 bg-gradient-to-br from-[#ff9800]/90 via-[#fffde7]/80 to-white/95 backdrop-blur-md rounded-2xl shadow-2xl border border-orange-300 px-8 py-6 mb-8 mt-2 overflow-hidden animate-fade-in">
                <!-- SVG pattern sudut kanan atas -->
                <svg class="absolute top-0 right-0 w-24 h-24 opacity-20" viewBox="0 0 100 100">
                    <circle cx="20" cy="20" r="8" fill="#ffe082"/>
                    <circle cx="60" cy="40" r="6" fill="#ff9800"/>
                    <circle cx="80" cy="80" r="10" fill="#fffde7"/>
                </svg>
                <div class="flex-shrink-0">
                    <div class="w-20 h-20 rounded-full bg-orange-500 flex items-center justify-center text-white text-3xl font-bold shadow-lg">
                        {{ strtoupper(substr(Auth::user()->username,0,1)) }}
                    </div>
                </div>
                <div class="flex-1 text-center md:text-left" style="font-family: 'Poppins', 'Figtree', Arial, sans-serif;">
                    <div class="text-2xl font-bold text-orange-700 mb-1" style="font-family: 'Poppins', 'Figtree', Arial, sans-serif;">{{ Auth::user()->username }}</div>
                    <div class="text-md text-gray-700 mb-1" style="font-family: 'Poppins', 'Figtree', Arial, sans-serif;">{{ Auth::user()->email ?? '-' }}</div>
                    <div class="text-md text-gray-700 mb-1" style="font-family: 'Poppins', 'Figtree', Arial, sans-serif;">{{ Auth::user()->no_hp ?? '-' }}</div>
                    <span class="inline-block px-3 py-1 rounded-full bg-orange-100 text-orange-700 text-xs font-semibold uppercase tracking-wider" style="font-family: 'Poppins', 'Figtree', Arial, sans-serif;">{{ Auth::user()->level }}</span>
                </div>
            </div>
            <div class="relative bg-gradient-to-br from-[#ff9800]/90 via-[#fffde7]/80 to-white/95 backdrop-blur-md shadow-2xl sm:rounded-2xl border border-orange-300 hover:shadow-2xl transition-all duration-300 mb-8 overflow-hidden">
                @if (session('success'))
                    <div class="mb-4 p-4 bg-green-500 text-white rounded">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="p-10 flex flex-col items-center justify-center min-h-[350px] animate-hero-fade">
                    <div class="flex flex-col md:flex-row items-center gap-10 w-full">
                        <div class="flex-1 text-center md:text-left animate-slide-in-left">
                            <h1 class="text-4xl md:text-5xl font-extrabold text-orange-600 mb-4 drop-shadow">Selamat Datang di SiHadir!</h1>
                            <p class="text-lg md:text-xl text-gray-700 mb-6">Aplikasi absensi siswa modern, mudah, dan efisien. Kelola kehadiran, jadwal kelas, dan rekap absensi dengan tampilan yang fresh dan ramah pengguna.</p>
                            <a href="{{ route('jadwal.siswa') }}" class="inline-block px-8 py-3 bg-orange-500 text-white rounded-full shadow hover:bg-yellow-400 hover:text-orange-900 transition-all duration-200 text-lg font-semibold">Lihat Jadwal Kelas</a>
                        </div>
                        <div class="flex-1 flex justify-center animate-slide-in-right">
                            <svg width="180" height="180" viewBox="0 0 180 180" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="90" cy="90" r="90" fill="#ffe082"/>
                                <rect x="50" y="60" width="80" height="60" rx="12" fill="#ff9800"/>
                                <rect x="60" y="75" width="60" height="10" rx="5" fill="#fffde7"/>
                                <rect x="60" y="95" width="40" height="10" rx="5" fill="#fffde7"/>
                                <circle cx="130" cy="115" r="8" fill="#fffde7"/>
                                <circle cx="130" cy="115" r="4" fill="#ff9800"/>
                            </svg>
                        </div>
                    </div>
                </div>
                <svg class="absolute bottom-0 left-0 w-full h-8" viewBox="0 0 100 10" preserveAspectRatio="none">
                    <path d="M0,0 Q50,20 100,0 V10 H0 Z" fill="#ffe082" fill-opacity="0.3"/>
                </svg>
            </div>
        </div>
        <!-- Card Grafik dan Riwayat Absensi -->
        <div class="max-w-5xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-8 mt-10">
            <!-- Grafik Mingguan -->
            <div class="relative bg-gradient-to-br from-[#ff9800]/80 via-[#ffe082]/70 to-white/90 rounded-2xl shadow-xl p-6 flex flex-col items-center border border-orange-200 hover:shadow-2xl transition-all duration-300 overflow-hidden animate-fade-in" style="animation-delay:0.2s;">
                <h3 class="text-lg font-bold text-orange-600 mb-4">Grafik Persentase Absensi 7 Hari Terakhir</h3>
                <canvas id="absensiChart" width="320" height="320"></canvas>
                <svg class="absolute bottom-0 left-0 w-full h-8" viewBox="0 0 100 10" preserveAspectRatio="none">
                    <path d="M0,0 Q50,20 100,0 V10 H0 Z" fill="#ffe082" fill-opacity="0.3"/>
                </svg>
            </div>
            <!-- Riwayat 3 Absensi Terakhir -->
            <div class="relative bg-gradient-to-br from-[#ff9800]/80 via-[#ffe082]/70 to-white/90 rounded-2xl shadow-xl p-6 border border-orange-200 hover:shadow-2xl transition-all duration-300 overflow-hidden flex flex-col justify-between animate-fade-in" style="animation-delay:0.4s;">
                <h3 class="text-lg font-bold text-orange-600 mb-4">3 Riwayat Absensi Terakhir</h3>
                <table class="w-full text-sm">
                    <thead>
                        <tr class="bg-orange-100">
                            <th class="px-3 py-2 text-left">Tanggal</th>
                            <th class="px-3 py-2 text-left">Jadwal</th>
                            <th class="px-3 py-2 text-left">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($riwayatTerakhir as $absen)
                        <tr class="border-b hover:bg-orange-50">
                            <td class="px-3 py-2">{{ $absen->tanggal }}</td>
                            <td class="px-3 py-2">{{ $absen->jadwal->nama_kelas ?? '-' }}</td>
                            <td class="px-3 py-2 capitalize font-bold text-orange-600">{{ $absen->status }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <a href="{{ route('laporan.absensi') }}" class="mt-6 block w-full py-3 bg-orange-500 text-white text-lg font-bold rounded-full shadow hover:bg-yellow-400 hover:text-orange-900 transition-all duration-200 text-center">Lihat Laporan Absensi</a>
                <svg class="absolute bottom-0 left-0 w-full h-8" viewBox="0 0 100 10" preserveAspectRatio="none">
                    <path d="M0,0 Q50,20 100,0 V10 H0 Z" fill="#ffe082" fill-opacity="0.3"/>
                </svg>
            </div>
        </div>
        <!-- Chart.js CDN & Script -->
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const ctx = document.getElementById('absensiChart').getContext('2d');
                const data = {
                    labels: ['Hadir', 'Izin', 'Sakit'],
                    datasets: [{
                        data: [
                            {{ $absensiMinggu->where('status','hadir')->count() }},
                            {{ $absensiMinggu->where('status','izin')->count() }},
                            {{ $absensiMinggu->where('status','sakit')->count() }}
                        ],
                        backgroundColor: [
                            '#ff9800', '#ffe082', '#ffb300'
                        ],
                        borderWidth: 2,
                    }]
                };
                new Chart(ctx, {
                    type: 'doughnut',
                    data: data,
                    options: {
                        responsive: true,
                        plugins: {
                            legend: {
                                position: 'bottom',
                                labels: { font: { family: 'Poppins', size: 14 } }
                            }
                        }
                    }
                });
            });
        </script>
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap');
            .bubble {
                position: absolute;
                border-radius: 50%;
                opacity: 0.13;
                z-index: 0;
                animation: float 7s ease-in-out infinite alternate;
            }
            .bubble1 { width: 120px; height: 120px; left: 8%; top: 18%; background: #fffde7; animation-duration: 8s; }
            .bubble2 { width: 80px; height: 80px; right: 12%; top: 30%; background: #ffe082; animation-duration: 6.5s; }
            .bubble3 { width: 100px; height: 100px; left: 28%; bottom: 12%; background: #ffb300; animation-duration: 9s; }
            .bubble4 { width: 60px; height: 60px; right: 18%; bottom: 18%; background: #ff9800; animation-duration: 5.5s; }
            .bubble5 { width: 90px; height: 90px; left: 65%; top: 8%; background: #fffde7; animation-duration: 7.5s; }
            @keyframes float {
                0% { transform: translateY(0); }
                100% { transform: translateY(-30px); }
            }
            .animate-hero-fade {
                opacity: 0;
                animation: heroFadeIn 1.2s ease-out 0.2s forwards;
            }
            @keyframes heroFadeIn {
                0% { opacity: 0; transform: scale(0.98); }
                100% { opacity: 1; transform: scale(1); }
            }
            .animate-slide-in-left {
                opacity: 0;
                transform: translateX(-40px);
                animation: slideInLeft 1.1s cubic-bezier(.68,-0.55,.27,1.55) 0.4s forwards;
            }
            @keyframes slideInLeft {
                0% { opacity: 0; transform: translateX(-40px); }
                100% { opacity: 1; transform: translateX(0); }
            }
            .animate-slide-in-right {
                opacity: 0;
                transform: translateX(40px);
                animation: slideInRight 1.1s cubic-bezier(.68,-0.55,.27,1.55) 0.6s forwards;
            }
            @keyframes slideInRight {
                0% { opacity: 0; transform: translateX(40px); }
                100% { opacity: 1; transform: translateX(0); }
            }
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
</x-app-layout>
