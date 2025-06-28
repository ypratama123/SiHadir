<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Rekap Akun User & Admin
        </h2>
    </x-slot>

    <a href="{{ url('/dashboard') }}" class="mb-6 inline-block px-4 py-2 bg-orange-500 text-white rounded shadow hover:bg-yellow-500 transition">&larr; Kembali ke Dashboard</a>

    <div class="max-w-4xl mx-auto mt-10">
        <div class="overflow-x-auto rounded-xl shadow">
            <table class="min-w-full bg-white/80 rounded-xl">
                <thead class="bg-gradient-to-r from-orange-400 to-yellow-200 text-white">
                    <tr>
                        <th class="py-3 px-4 text-left">Nama</th>
                        <th class="py-3 px-4 text-left">Username</th>
                        <th class="py-3 px-4 text-left">Email</th>
                        <th class="py-3 px-4 text-left">No HP</th>
                        <th class="py-3 px-4 text-left">Level</th>
                        <th class="py-3 px-4 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr class="border-b hover:bg-orange-50">
                        <td class="py-2 px-4">{{ $user->name }}</td>
                        <td class="py-2 px-4">{{ $user->username }}</td>
                        <td class="py-2 px-4">{{ $user->email }}</td>
                        <td class="py-2 px-4">{{ $user->no_hp }}</td>
                        <td class="py-2 px-4 capitalize">{{ $user->level }}</td>
                        <td class="py-2 px-4 text-center">
                            <form action="{{ route('rekap.user.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Yakin hapus user ini?')" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout> 