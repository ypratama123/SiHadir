@extends('layouts.app')
@section('title','Edit User')
@section('content')
<div class="max-w-lg mx-auto mt-10 bg-white/90 rounded-xl shadow p-8">
    <h2 class="text-xl font-bold mb-6 text-orange-600">Edit User</h2>
    <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label class="block mb-1 font-poppins font-semibold text-gray-700">Nama</label>
            <input type="text" name="name" value="{{ old('name', $user->name) }}" class="w-full rounded border px-3 py-2" required>
        </div>
        <div class="mb-4">
            <label class="block mb-1 font-poppins font-semibold text-gray-700">Username</label>
            <input type="text" name="username" value="{{ old('username', $user->username) }}" class="w-full rounded border px-3 py-2" required>
        </div>
        <div class="mb-4">
            <label class="block mb-1 font-poppins font-semibold text-gray-700">Email</label>
            <input type="email" name="email" value="{{ old('email', $user->email) }}" class="w-full rounded border px-3 py-2">
        </div>
        <div class="mb-4">
            <label class="block mb-1 font-poppins font-semibold text-gray-700">No HP</label>
            <input type="text" name="no_hp" value="{{ old('no_hp', $user->no_hp) }}" class="w-full rounded border px-3 py-2">
        </div>
        <div class="mb-6">
            <label class="block mb-1 font-poppins font-semibold text-gray-700">Level</label>
            <select name="level" class="w-full rounded border px-3 py-2" required>
                <option value="admin" @if($user->level=='admin') selected @endif>Admin</option>
                <option value="siswa" @if($user->level=='siswa') selected @endif>Siswa</option>
            </select>
        </div>
        <div class="flex gap-2">
            <button type="submit" class="bg-orange-500 text-white px-4 py-2 rounded hover:bg-orange-600">Simpan</button>
            <a href="{{ route('admin.users.index') }}" class="bg-gray-200 px-4 py-2 rounded hover:bg-gray-300">Kembali</a>
        </div>
    </form>
</div>
@endsection 