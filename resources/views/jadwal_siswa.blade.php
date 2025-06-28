<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-orange-600 leading-tight">
            {{ __('Jadwal Kelas') }}
        </h2>
    </x-slot>

    <div class="py-10" style="background: linear-gradient(135deg, #ff9800 0%, #ffe082 100%); min-height: 100vh;">
        <div class="max-w-5xl mx-auto">
            <a href="{{ route('dashboard') }}" class="mb-6 inline-block px-4 py-2 bg-orange-500 text-white rounded shadow hover:bg-yellow-500 transition">&larr; Kembali ke Dashboard</a>
            <a href="{{ route('absensi.index') }}" class="block w-full mb-8 py-4 bg-orange-500 text-white text-2xl font-bold rounded-full shadow-lg text-center hover:bg-yellow-400 hover:text-orange-900 transition-all duration-200">Absen Sekarang</a>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mt-4">
                @forelse ($jadwals as $jadwal)
                    <div class="bg-white/90 rounded-lg shadow-lg p-6 flex flex-col justify-between border-l-8 border-orange-400 hover:scale-105 transition-transform">
                        <div>
                            <h3 class="text-xl font-bold text-orange-700 mb-2">{{ $jadwal->nama_kelas }}</h3>
                            <p class="mb-1"><b>Hari:</b> {{ $jadwal->hari }}</p>
                            <p class="mb-1"><b>Jam:</b> {{ \Carbon\Carbon::createFromFormat('H:i:s', $jadwal->jam_mulai)->format('H.i') }} - {{ \Carbon\Carbon::createFromFormat('H:i:s', $jadwal->jam_selesai)->format('H.i') }}</p>
                            @if($jadwal->keterangan)
                                <p class="mb-2"><b>Keterangan:</b> {{ $jadwal->keterangan }}</p>
                            @endif
                        </div>
                    </div>
                @empty
                    <div class="col-span-3 text-center text-orange-700 font-semibold">Belum ada jadwal kelas.</div>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout> 