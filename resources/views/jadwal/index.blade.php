<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Kelola Jadwal Kelas') }}
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
            @if (session('success'))
                <div class="mb-4 p-4 bg-green-500 text-white rounded">
                    {{ session('success') }}
                </div>
            @endif
            <a href="{{ url('/dashboard') }}" class="mb-6 inline-block px-4 py-2 bg-orange-500 text-white rounded shadow hover:bg-yellow-500 transition">&larr; Kembali ke Dashboard</a>
            <form method="POST" action="{{ route('jadwal.store') }}" class="mb-8">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 font-poppins">
                    <div>
                        <label class="block mb-1 font-semibold text-orange-700">Nama Kelas</label>
                        <input type="text" name="nama_kelas" class="w-full p-2 border border-orange-200 rounded focus:ring-2 focus:ring-orange-400" required>
                    </div>
                    <div>
                        <label class="block mb-1 font-semibold text-orange-700">Hari</label>
                        <select name="hari" class="w-full p-2 border border-orange-200 rounded focus:ring-2 focus:ring-orange-400" required>
                            <option value="">-- Pilih Hari --</option>
                            <option value="Senin">Senin</option>
                            <option value="Selasa">Selasa</option>
                            <option value="Rabu">Rabu</option>
                            <option value="Kamis">Kamis</option>
                            <option value="Jumat">Jumat</option>
                            <option value="Sabtu">Sabtu</option>
                            <option value="Minggu">Minggu</option>
                        </select>
                    </div>
                    <div>
                        <label class="block mb-1 font-semibold text-orange-700">Jam Mulai</label>
                        <input type="time" name="jam_mulai" class="w-full p-2 border border-orange-200 rounded focus:ring-2 focus:ring-orange-400" required>
                    </div>
                    <div>
                        <label class="block mb-1 font-semibold text-orange-700">Jam Selesai</label>
                        <input type="time" name="jam_selesai" class="w-full p-2 border border-orange-200 rounded focus:ring-2 focus:ring-orange-400" required>
                    </div>
                    <div class="md:col-span-2">
                        <label class="block mb-1 font-semibold text-orange-700">Keterangan</label>
                        <input type="text" name="keterangan" class="w-full p-2 border border-orange-200 rounded focus:ring-2 focus:ring-orange-400">
                    </div>
                </div>
                <div class="flex gap-2 mt-6">
                    <button type="submit" class="bg-yellow-500 text-white px-5 py-2 rounded-lg font-semibold shadow hover:bg-yellow-600 transition">Tambah Jadwal</button>
                </div>
            </form>

            <h3 class="text-lg font-bold mb-2">Daftar Jadwal Kelas</h3>
            <table class="w-full table-auto border-collapse">
                <thead>
                    <tr class="bg-gradient-to-r from-orange-400 to-yellow-200 text-white">
                        <th class="p-2 border">Nama Kelas</th>
                        <th class="p-2 border">Hari</th>
                        <th class="p-2 border">Jam Mulai</th>
                        <th class="p-2 border">Jam Selesai</th>
                        <th class="p-2 border">Keterangan</th>
                        <th class="p-2 border">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($jadwals as $jadwal)
                        <tr>
                            <td class="p-2 border font-bold text-gray-800">{{ $jadwal->nama_kelas }}</td>
                            <td class="p-2 border text-gray-800">{{ $jadwal->hari }}</td>
                            <td class="p-2 border text-gray-800">{{ \Carbon\Carbon::createFromFormat('H:i:s', $jadwal->jam_mulai)->format('H.i') }}</td>
                            <td class="p-2 border text-gray-800">{{ \Carbon\Carbon::createFromFormat('H:i:s', $jadwal->jam_selesai)->format('H.i') }}</td>
                            <td class="p-2 border text-gray-800">{{ $jadwal->keterangan }}</td>
                            <td class="p-2 border text-center">
                                <a href="{{ route('jadwal.edit', $jadwal->id) }}" class="px-2 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600">Edit</a>
                                <form action="{{ route('jadwal.destroy', $jadwal->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin ingin hapus jadwal ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="px-2 py-1 bg-red-600 text-white rounded hover:bg-red-700">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="p-2 border text-center text-gray-500">Belum ada jadwal kelas.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout> 