<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JadwalKelas;

class JadwalKelasController extends Controller
{
    public function index()
    {
        $jadwals = JadwalKelas::orderBy('hari')->orderBy('jam_mulai')->get();
        return view('jadwal.index', compact('jadwals'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kelas' => 'required|string|max:255',
            'hari' => 'required|string|max:20',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
            'keterangan' => 'nullable|string',
        ]);

        JadwalKelas::create($request->all());
        return redirect()->route('jadwal.index')->with('success', 'Jadwal kelas berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $jadwal = JadwalKelas::findOrFail($id);
        $jadwals = JadwalKelas::orderBy('hari')->orderBy('jam_mulai')->get();
        return view('jadwal.edit', compact('jadwal', 'jadwals'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kelas' => 'required|string|max:255',
            'hari' => 'required|string|max:20',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
            'keterangan' => 'nullable|string',
        ]);
        $jadwal = JadwalKelas::findOrFail($id);
        $jadwal->update($request->all());
        return redirect()->route('jadwal.index')->with('success', 'Jadwal kelas berhasil diupdate!');
    }

    public function destroy($id)
    {
        $jadwal = JadwalKelas::findOrFail($id);
        $jadwal->delete();
        return redirect()->route('jadwal.index')->with('success', 'Jadwal kelas berhasil dihapus!');
    }
}
