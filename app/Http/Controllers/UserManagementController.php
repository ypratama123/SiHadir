<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class UserManagementController extends Controller
{
    // Tampilkan daftar user
    public function index()
    {
        $users = User::orderBy('level')->orderBy('username')->get();
        return view('users.index', compact('users'));
    }

    // Tampilkan form edit user
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
    }

    // Proses update user
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $request->validate([
            'name' => 'required',
            'username' => 'required|unique:users,username,' . $id,
            'email' => 'nullable|email',
            'no_hp' => 'nullable',
            'level' => 'required',
        ]);
        $user->update($request->only('name','username','email','no_hp','level'));
        return Redirect::route('admin.users.index')->with('success','User berhasil diupdate.');
    }

    // Hapus user
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return Redirect::route('admin.users.index')->with('success','User berhasil dihapus.');
    }

    // Tampilkan form reset password
    public function resetPasswordForm($id)
    {
        $user = User::findOrFail($id);
        return view('users.reset-password', compact('user'));
    }

    // Proses reset password
    public function resetPassword(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $request->validate([
            'password' => 'required|confirmed|min:6',
        ]);
        $user->password = Hash::make($request->password);
        $user->save();
        return Redirect::route('admin.users.index')->with('success','Password user berhasil direset.');
    }

    // Rekap user sederhana (tanpa edit/hapus/reset)
    public function rekap()
    {
        if (!auth()->check() || auth()->user()->level !== 'admin') {
            abort(403, 'Akses hanya untuk admin');
        }
        $users = \App\Models\User::orderBy('level')->orderBy('username')->get();
        return view('users.rekap', compact('users'));
    }

    // Hapus user dari halaman rekap
    public function rekapDestroy($id)
    {
        if (!auth()->check() || auth()->user()->level !== 'admin') {
            abort(403, 'Akses hanya untuk admin');
        }
        $user = \App\Models\User::findOrFail($id);
        $user->delete();
        return redirect()->route('rekap.user')->with('success', 'User berhasil dihapus.');
    }

    // Daftar user (siswa) dalam bentuk card untuk rekap absen
    public function rekapAbsenUserList()
    {
        if (!auth()->check() || auth()->user()->level !== 'admin') {
            abort(403, 'Akses hanya untuk admin');
        }
        $users = \App\Models\User::where('level', 'siswa')->orderBy('username')->get();
        return view('users.rekap_absen_list', compact('users'));
    }

    // Detail rekap absen user tertentu
    public function rekapAbsenUserDetail($id)
    {
        if (!auth()->check() || auth()->user()->level !== 'admin') {
            abort(403, 'Akses hanya untuk admin');
        }
        $user = \App\Models\User::findOrFail($id);
        $absensis = \App\Models\Absensi::with('jadwal')
            ->where('user_id', $id)
            ->orderByDesc('tanggal')
            ->get();
        return view('users.rekap_absen_detail', compact('user', 'absensis'));
    }
} 