<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-orange-600 leading-tight">
            {{ __('Laporan Absensi') }}
        </h2>
    </x-slot>
    <div class="py-12" style="background: linear-gradient(135deg, #ff9800 0%, #ffe082 100%); min-height: 100vh; font-family: 'Poppins', 'Figtree', Arial, sans-serif;">
        <div class="max-w-5xl mx-auto bg-white/90 shadow-2xl rounded-2xl p-8">
            <a href="{{ route('dashboard') }}" class="mb-6 inline-block px-4 py-2 bg-orange-500 text-white rounded shadow hover:bg-yellow-500 transition">&larr; Kembali ke Dashboard</a>
            <table class="min-w-full text-sm rounded-lg overflow-hidden shadow-lg">
                <thead>
                    <tr class="bg-orange-500 text-white">
                        <th class="px-4 py-3 text-left font-semibold">Nama</th>
                        <th class="px-4 py-3 text-left font-semibold">Tanggal</th>
                        <th class="px-4 py-3 text-left font-semibold">Jadwal</th>
                        <th class="px-4 py-3 text-left font-semibold">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($absensis as $absen)
                    <tr class="border-b border-orange-100 hover:bg-orange-50 transition">
                        <td class="px-4 py-3">{{ $absen->user->name ?? '-' }}</td>
                        <td class="px-4 py-3">{{ $absen->tanggal }}</td>
                        <td class="px-4 py-3">{{ $absen->jadwal->nama_kelas ?? '-' }}</td>
                        <td class="px-4 py-3 capitalize font-bold text-orange-600">{{ $absen->status }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="mt-6">
                {{ $absensis->links() }}
            </div>
        </div>
    </div>
</x-app-layout> 