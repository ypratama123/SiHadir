@extends('layouts.app')
@section('title','Manajemen User')
@section('content')
<div class="max-w-5xl mx-auto mt-10">
    <h2 class="text-2xl font-bold mb-6 text-orange-600">Daftar User</h2>
    @if(session('success'))
        <div class="mb-4 p-3 bg-green-100 text-green-800 rounded">{{ session('success') }}</div>
    @endif
    <div class="overflow-x-auto rounded-xl shadow">
    <table class="min-w-full bg-white/80 rounded-xl">
        <thead class="bg-gradient-to-r from-orange-400 to-yellow-200 text-white">
            <tr>
                <th class="py-3 px-4 text-left">Username</th>
                <th class="py-3 px-4 text-left">Nama</th>
                <th class="py-3 px-4 text-left">Email</th>
                <th class="py-3 px-4 text-left">No HP</th>
                <th class="py-3 px-4 text-left">Level</th>
                <th class="py-3 px-4 text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr class="border-b hover:bg-orange-50">
                <td class="py-2 px-4">{{ $user->username }}</td>
                <td class="py-2 px-4">{{ $user->name }}</td>
                <td class="py-2 px-4">{{ $user->email }}</td>
                <td class="py-2 px-4">{{ $user->no_hp }}</td>
                <td class="py-2 px-4 capitalize">{{ $user->level }}</td>
                <td class="py-2 px-4 text-center">
                    <a href="{{ route('admin.users.edit', $user->id) }}" class="text-blue-600 hover:underline mr-2">Edit</a>
                    <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="inline">
                        @csrf @method('DELETE')
                        <button type="submit" class="text-red-600 hover:underline mr-2" onclick="return confirm('Yakin hapus user ini?')">Hapus</button>
                    </form>
                    <a href="{{ route('admin.users.reset-password.form', $user->id) }}" class="text-orange-600 hover:underline">Reset Password</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>
</div>
@endsection 