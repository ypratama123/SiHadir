<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserManagementController;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/dashboard', function () {
    if (Auth::user()->level == 'admin') {
        return view('dashboard_admin');
    }
    $jadwals = \App\Models\JadwalKelas::orderBy('hari')->orderBy('jam_mulai')->get();
    $absensiMinggu = \App\Models\Absensi::where('user_id', Auth::id())
        ->where('tanggal', '>=', now()->subDays(6)->toDateString())
        ->get();
    $riwayatTerakhir = \App\Models\Absensi::with('jadwal')
        ->where('user_id', Auth::id())
        ->orderByDesc('tanggal')
        ->orderByDesc('created_at')
        ->limit(3)
        ->get();
    return view('dashboard', compact('jadwals', 'absensiMinggu', 'riwayatTerakhir'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/absensi', [\App\Http\Controllers\AbsensiController::class, 'index'])->name('absensi.index');
    Route::post('/absensi', [\App\Http\Controllers\AbsensiController::class, 'store'])->name('absensi.store');
    Route::get('/jadwal', [\App\Http\Controllers\JadwalKelasController::class, 'index'])->name('jadwal.index');
    Route::post('/jadwal', [\App\Http\Controllers\JadwalKelasController::class, 'store'])->name('jadwal.store');
    Route::get('/jadwal/{id}/edit', [\App\Http\Controllers\JadwalKelasController::class, 'edit'])->name('jadwal.edit');
    Route::post('/jadwal/{id}/update', [\App\Http\Controllers\JadwalKelasController::class, 'update'])->name('jadwal.update');
    Route::delete('/jadwal/{id}', [\App\Http\Controllers\JadwalKelasController::class, 'destroy'])->name('jadwal.destroy');
    Route::get('/jadwal-siswa', function () {
        $jadwals = \App\Models\JadwalKelas::orderBy('hari')->orderBy('jam_mulai')->get();
        return view('jadwal_siswa', compact('jadwals'));
    })->name('jadwal.siswa');
    Route::get('/laporan-absensi', [App\Http\Controllers\AbsensiController::class, 'laporan'])->name('laporan.absensi');
    Route::get('/riwayat-absensi', [App\Http\Controllers\AbsensiController::class, 'riwayat'])->name('riwayat.absensi');
});

// Group route admin
Route::middleware(['auth', 'verified'])->group(function () {
    Route::middleware('admin')->prefix('admin')->name('admin.')->group(function () {
        Route::resource('users', UserManagementController::class)->except(['show', 'create', 'store']);
        Route::get('users/{user}/reset-password', [UserManagementController::class, 'resetPasswordForm'])->name('users.reset-password.form');
        Route::post('users/{user}/reset-password', [UserManagementController::class, 'resetPassword'])->name('users.reset-password');
    });
});

// Route rekap user sederhana (khusus admin, tanpa middleware admin)
Route::get('/rekap-user', [UserManagementController::class, 'rekap'])->middleware(['auth', 'verified'])->name('rekap.user');

// Route hapus user dari halaman rekap-user
Route::delete('/rekap-user/{user}', [UserManagementController::class, 'rekapDestroy'])->middleware(['auth', 'verified'])->name('rekap.user.destroy');

// Rekap absen per user (admin)
Route::get('/rekap-absen-user', [UserManagementController::class, 'rekapAbsenUserList'])->middleware(['auth', 'verified'])->name('rekap.absen.user.list');
Route::get('/rekap-absen-user/{id}', [UserManagementController::class, 'rekapAbsenUserDetail'])->middleware(['auth', 'verified'])->name('rekap.absen.user.detail');

require __DIR__.'/auth.php';
