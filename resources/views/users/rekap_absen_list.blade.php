<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Rekap Absen Siswa
        </h2>
    </x-slot>
    <a href="{{ url('/dashboard') }}" class="mb-6 inline-block px-4 py-2 bg-orange-500 text-white rounded shadow hover:bg-yellow-500 transition">&larr; Kembali ke Dashboard</a>
    <div class="max-w-5xl mx-auto mt-10 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
        @foreach($users as $user)
        <div class="bg-white/90 rounded-xl shadow p-6 flex flex-col items-center border border-orange-200">
            <div class="w-16 h-16 rounded-full bg-orange-100 flex items-center justify-center text-2xl font-bold text-orange-600 mb-3">
                {{ strtoupper(substr($user->name,0,1)) }}
            </div>
            <div class="font-semibold text-lg text-gray-800 mb-1">{{ $user->name }}</div>
            <div class="text-sm text-gray-500 mb-2">{{ $user->username }}</div>
            <a href="{{ route('rekap.absen.user.detail', $user->id) }}" class="mt-2 px-4 py-2 bg-orange-500 text-white rounded hover:bg-orange-600 font-semibold shadow">Lihat Rekap Absen</a>
        </div>
        @endforeach
    </div>
</x-app-layout> 