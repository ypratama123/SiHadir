<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Rekap Absen: {{ $user->name }} ({{ $user->username }})
        </h2>
    </x-slot>
    <a href="{{ url('/dashboard') }}" class="mb-6 inline-block px-4 py-2 bg-orange-500 text-white rounded shadow hover:bg-yellow-500 transition">&larr; Kembali ke Dashboard</a>
    <style>
    @media print {
        body { background: #fff !important; }
        .print\:hidden { display: none !important; }
        .print\:border, .print\:border th, .print\:border td {
            border: 1px solid #333 !important;
            border-collapse: collapse !important;
        }
        .print\:table th, .print\:table td {
            padding: 8px 12px !important;
            font-size: 15px !important;
        }
        .print\:judul {
            font-size: 22px !important;
            font-weight: bold !important;
            margin-bottom: 18px !important;
            text-align: center !important;
        }
        .print\:profil {
            margin-bottom: 18px !important;
            font-size: 16px !important;
        }
        .shadow, .rounded-xl, .bg-white\/90, .overflow-x-auto {
            box-shadow: none !important;
            border-radius: 0 !important;
            background: #fff !important;
            overflow: visible !important;
        }
    }
    </style>
    <div class="max-w-3xl mx-auto mt-10 bg-white/90 rounded-xl shadow p-8">
        <div class="print:judul font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight mb-6">Rekap Absen: {{ $user->name }} ({{ $user->username }})</div>
        <div class="mb-6 flex justify-between items-center print:profil">
            <div>
                <div class="font-bold text-lg text-orange-600">{{ $user->name }}</div>
                <div class="text-sm text-gray-500">Username: {{ $user->username }}</div>
                <div class="text-sm text-gray-500">Email: {{ $user->email }}</div>
                <div class="text-sm text-gray-500">No HP: {{ $user->no_hp }}</div>
            </div>
            <button onclick="window.print()" class="px-4 py-2 bg-orange-500 text-white rounded hover:bg-orange-600 font-semibold shadow print:hidden">Print</button>
        </div>
        <div class="overflow-x-auto rounded-xl shadow">
            <table class="min-w-full bg-white/80 rounded-xl print:border print:table">
                <thead class="bg-gradient-to-r from-orange-400 to-yellow-200 text-white print:border">
                    <tr>
                        <th class="py-3 px-4 text-left print:border">Tanggal</th>
                        <th class="py-3 px-4 text-left print:border">Jadwal</th>
                        <th class="py-3 px-4 text-left print:border">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($absensis as $absen)
                    <tr class="border-b hover:bg-orange-50 print:border">
                        <td class="py-2 px-4 print:border">{{ $absen->tanggal }}</td>
                        <td class="py-2 px-4 print:border">{{ $absen->jadwal ? $absen->jadwal->nama_kelas.' ('.$absen->jadwal->hari.')' : '-' }}</td>
                        <td class="py-2 px-4 capitalize print:border">{{ $absen->status }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout> 