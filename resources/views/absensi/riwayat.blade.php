<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-orange-600 leading-tight">
            {{ __('Riwayat Absensi Saya') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-3xl mx-auto bg-white/90 shadow-lg rounded-lg p-8">
            <table class="min-w-full text-sm">
                <thead>
                    <tr>
                        <th class="px-4 py-2 text-left">Tanggal</th>
                        <th class="px-4 py-2 text-left">Jadwal</th>
                        <th class="px-4 py-2 text-left">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($absensis as $absen)
                    <tr class="border-b">
                        <td class="px-4 py-2">{{ $absen->tanggal }}</td>
                        <td class="px-4 py-2">{{ $absen->jadwal->nama_kelas ?? '-' }}</td>
                        <td class="px-4 py-2 capitalize">{{ $absen->status }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="mt-4">
                {{ $absensis->links() }}
            </div>
        </div>
    </div>
</x-app-layout> 