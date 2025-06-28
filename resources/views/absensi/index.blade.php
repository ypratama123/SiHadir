<x-app-layout>
    <div class="min-h-screen flex flex-col items-center justify-center py-12 px-4 sm:px-6 lg:px-8" style="background: linear-gradient(135deg, #ff9800 0%, #ffe082 100%);">
        <div class="w-full max-w-md bg-white/95 rounded-2xl shadow-2xl p-8 flex flex-col items-center animate-hero-fade">
            <a href="{{ route('dashboard') }}" class="mb-6 inline-block px-4 py-2 bg-orange-500 text-white rounded shadow hover:bg-yellow-500 transition">&larr; Kembali ke Dashboard</a>
            @if(session('error'))
                <div class="mb-4 w-full p-3 bg-red-500 text-white rounded text-center font-semibold shadow">
                    {{ session('error') }}
                </div>
            @endif
            <div class="mb-6 text-center">
                <h2 class="text-3xl font-extrabold text-orange-600 mb-2 drop-shadow">Form Absensi</h2>
                <p class="text-gray-700 text-md">Silakan pilih status kehadiran Anda untuk hari ini.</p>
            </div>
            <form method="POST" action="{{ route('absensi.store') }}" class="w-full">
                @csrf
                <div class="mb-6">
                    <label for="jadwal_id" class="block text-lg font-semibold text-gray-800 mb-2">Jadwal Kelas</label>
                    <select name="jadwal_id" id="jadwal_id" class="w-full p-3 border border-orange-200 rounded-lg focus:ring-2 focus:ring-orange-400 focus:outline-none text-gray-800 bg-white" required>
                        <option value="">-- Pilih Jadwal --</option>
                        @foreach($jadwals as $jadwal)
                            <option value="{{ $jadwal->id }}">{{ $jadwal->nama_kelas }} ({{ $jadwal->hari }}, {{ \Carbon\Carbon::createFromFormat('H:i:s', $jadwal->jam_mulai)->format('H.i') }}-{{ \Carbon\Carbon::createFromFormat('H:i:s', $jadwal->jam_selesai)->format('H.i') }})</option>
                        @endforeach
                    </select>
                    @error('jadwal_id')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="status" class="block text-lg font-semibold text-gray-800 mb-2">Status Kehadiran</label>
                    <select name="status" id="status" class="w-full p-3 border border-orange-200 rounded-lg focus:ring-2 focus:ring-orange-400 focus:outline-none text-gray-800 bg-white" required>
                        <option value="">-- Pilih Status --</option>
                        <option value="hadir">Hadir</option>
                        <option value="izin">Izin</option>
                        <option value="sakit">Sakit</option>
                    </select>
                    @error('status')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="w-full py-3 bg-orange-500 text-white text-lg font-bold rounded-lg shadow hover:bg-yellow-400 hover:text-orange-900 transition-all duration-200">Absen</button>
            </form>
        </div>
        <style>
            .animate-hero-fade {
                opacity: 0;
                animation: heroFadeIn 1.2s ease-out 0.2s forwards;
            }
            @keyframes heroFadeIn {
                0% { opacity: 0; transform: scale(0.98); }
                100% { opacity: 1; transform: scale(1); }
            }
        </style>
    </div>
</x-app-layout> 