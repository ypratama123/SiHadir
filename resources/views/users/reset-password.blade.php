@extends('layouts.app')
@section('title','Reset Password User')
@section('content')
<div class="max-w-lg mx-auto mt-10 bg-white/90 rounded-xl shadow p-8">
    <h2 class="text-xl font-bold mb-6 text-orange-600">Reset Password User</h2>
    <form action="{{ route('admin.users.reset-password', $user->id) }}" method="POST">
        @csrf
        <div class="mb-4">
            <label class="block mb-1 font-poppins font-semibold text-gray-700">Password Baru</label>
            <input type="password" name="password" class="w-full rounded border px-3 py-2" required>
        </div>
        <div class="mb-6">
            <label class="block mb-1 font-poppins font-semibold text-gray-700">Konfirmasi Password</label>
            <input type="password" name="password_confirmation" class="w-full rounded border px-3 py-2" required>
        </div>
        <div class="flex gap-2">
            <button type="submit" class="bg-orange-500 text-white px-4 py-2 rounded hover:bg-orange-600">Simpan</button>
            <a href="{{ route('admin.users.index') }}" class="bg-gray-200 px-4 py-2 rounded hover:bg-gray-300">Kembali</a>
        </div>
    </form>
</div>
@endsection 