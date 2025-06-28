<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Absensi;
use Illuminate\Support\Facades\Auth;

class AbsensiController extends Controller
{
    public function index()
    {
        $jadwals = \App\Models\JadwalKelas::orderBy('hari')->orderBy('jam_mulai')->get();
        return view('absensi.index', compact('jadwals'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'status' => 'required|in:hadir,izin,sakit,alfa',
            'jadwal_id' => 'required|exists:jadwal_kelas,id',
        ]);

        $sudahAbsen = \App\Models\Absensi::where('user_id', Auth::id())
            ->where('jadwal_id', $request->jadwal_id)
            ->where('tanggal', date('Y-m-d'))
            ->exists();

        if ($sudahAbsen) {
            return redirect()->back()->with('error', 'Anda sudah melakukan absensi untuk jadwal ini hari ini.');
        }

        Absensi::create([
            'user_id' => Auth::id(),
            'jadwal_id' => $request->jadwal_id,
            'tanggal' => date('Y-m-d'),
            'status' => $request->status,
        ]);

        return redirect()->route('dashboard')->with('success', 'Absensi berhasil!');
    }

    public function laporan()
    {
        if (auth()->user()->level == 'admin') {
            $absensis = \App\Models\Absensi::with(['user', 'jadwal'])->latest()->paginate(20);
        } else {
            $absensis = \App\Models\Absensi::with(['user', 'jadwal'])
                ->where('user_id', auth()->id())
                ->latest()
                ->paginate(20);
        }
        return view('absensi.laporan', compact('absensis'));
    }

    public function riwayat()
    {
        $absensis = \App\Models\Absensi::with('jadwal')
            ->where('user_id', Auth::id())
            ->latest()
            ->paginate(20);
        return view('absensi.riwayat', compact('absensis'));
    }
}
