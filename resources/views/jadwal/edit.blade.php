<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Jadwal Kelas') }}
        </h2>
    </x-slot>
    <a href="{{ url('/dashboard') }}" class="mb-6 inline-block px-4 py-2 bg-orange-500 text-white rounded shadow hover:bg-yellow-500 transition">&larr; Kembali ke Dashboard</a>

    <div class="py-12">
        <div class="relative max-w-2xl mx-auto bg-gradient-to-br from-[#ff9800]/90 via-[#fffde7]/80 to-white/95 backdrop-blur-md rounded-2xl shadow-2xl border border-orange-300 px-8 py-8 overflow-hidden">
            <!-- SVG pattern sudut kanan atas -->
            <svg class="absolute top-0 right-0 w-24 h-24 opacity-20" viewBox="0 0 100 100">
                <circle cx="20" cy="20" r="8" fill="#ffe082"/>
                <circle cx="60" cy="40" r="6" fill="#ff9800"/>
                <circle cx="80" cy="80" r="10" fill="#fffde7"/>
            </svg>
            <form method="POST" action="{{ route('jadwal.update', $jadwal->id) }}">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 font-poppins">
                    <div>
                        <label class="block mb-1 font-semibold text-orange-700">Nama Kelas</label>
                        <input type="text" name="nama_kelas" class="w-full p-2 border border-orange-200 rounded focus:ring-2 focus:ring-orange-400" value="{{ $jadwal->nama_kelas }}" required>
                    </div>
                    <div>
                        <label class="block mb-1 font-semibold text-orange-700">Hari</label>
                        <select name="hari" class="w-full p-2 border border-orange-200 rounded focus:ring-2 focus:ring-orange-400" required>
                            <option value="">-- Pilih Hari --</option>
                            @foreach(['Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu'] as $hari)
                                <option value="{{ $hari }}" @if($jadwal->hari == $hari) selected @endif>{{ $hari }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label class="block mb-1 font-semibold text-orange-700">Jam Mulai</label>
                        <input type="time" name="jam_mulai" class="w-full p-2 border border-orange-200 rounded focus:ring-2 focus:ring-orange-400" value="{{ $jadwal->jam_mulai }}" required>
                    </div>
                    <div>
                        <label class="block mb-1 font-semibold text-orange-700">Jam Selesai</label>
                        <input type="time" name="jam_selesai" class="w-full p-2 border border-orange-200 rounded focus:ring-2 focus:ring-orange-400" value="{{ $jadwal->jam_selesai }}" required>
                    </div>
                    <div class="md:col-span-2">
                        <label class="block mb-1 font-semibold text-orange-700">Keterangan</label>
                        <input type="text" name="keterangan" class="w-full p-2 border border-orange-200 rounded focus:ring-2 focus:ring-orange-400" value="{{ $jadwal->keterangan }}">
                    </div>
                </div>
                <div class="flex gap-2 mt-6">
                    <button type="submit" class="bg-yellow-500 text-white px-5 py-2 rounded-lg font-semibold shadow hover:bg-yellow-600 transition">Update Jadwal</button>
                    <a href="{{ route('jadwal.index') }}" class="bg-gray-300 text-gray-700 px-5 py-2 rounded-lg font-semibold shadow hover:bg-gray-400 transition">Batal</a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout> 