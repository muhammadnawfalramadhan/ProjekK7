<?php

namespace App\Http\Controllers\TukangTimbang;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Timbangan;
use Carbon\Carbon;

class WebSawit extends Controller
{
    // --- AUTH ---
    // Mengoreksi 'TUkangTimbang' (U besar) menjadi 'TukangTimbang'
    public function loginForm() { return view('TukangTimbang.login-form'); }

    public function login(Request $request) {
        if ($request->username === 'nofal' && $request->password === 'Nofal22') {
            session(['username' => $request->username]);
            return redirect()->route('tukang.dashboard');
        }
        return back()->with('error', 'Gagal Login');
    }

    public function logout(Request $request) {
        $request->session()->forget(['username']);
        return redirect()->route('auth.loginForm');
    }

    // Asumsi 'register-form' juga ada di folder TukangTimbang
    public function registerForm() { return view('TukangTimbang.register-form'); }

    public function register(Request $request) { return redirect()->route('auth.loginForm'); }

    // --- DASHBOARD ---
    public function dashboardTukang() {
        if (!session()->has('username')) return redirect()->route('auth.loginForm');
        $username = session('username');

        $dataHariIni = Timbangan::where('tukang_id', $username)
                            ->whereDate('created_at', Carbon::today())
                            ->get();

        $dataTerbaru = Timbangan::where('tukang_id', $username)
                            ->orderBy('created_at', 'desc')
                            ->take(5)
                            ->get();

        // FIX: Menggunakan notasi titik ('.') untuk sub-folder
        return view('TukangTimbang.login-tukangtimbangsukses', compact('username', 'dataHariIni', 'dataTerbaru'));
    }

    // --- DATA TIMBANGAN (Gabungan Arsip + Filter) ---
    public function dataTimbangan(Request $request) {
        if (!session()->has('username')) return redirect()->route('auth.loginForm');
        $username = session('username');

        $query = Timbangan::where('tukang_id', $username);

        // Logika Filter Tanggal
        if ($request->tgl_awal && $request->tgl_akhir) {
            $query->whereBetween('created_at', [
                $request->tgl_awal . ' 00:00:00',
                $request->tgl_akhir . ' 23:59:59'
            ]);
        }

        $dataTimbangan = $query->orderBy('created_at', 'desc')->get();

        // FIX: Menggunakan notasi titik ('.') untuk sub-folder
        return view('TukangTimbang.data-timbangan', compact('username', 'dataTimbangan'));
    }

    // --- INPUT FORM ---
    public function inputTimbangan() {
        if (!session()->has('username')) return redirect()->route('auth.loginForm');
        $username = session('username');

        // FIX: Menggunakan notasi titik ('.') untuk sub-folder
        return view('TukangTimbang.input-timbangan', compact('username'));
    }

    // --- CRUD ---
    public function storeTimbangan(Request $request) {
        Timbangan::create([
            'tukang_id' => session('username'),
            'nama_petani' => $request->nama_petani,
            'berat' => $request->berat,
            'keterangan' => $request->keterangan
        ]);
        return redirect()->route('tukang.input')->with('success', 'Data Berhasil Disimpan!');
    }

    public function updateTimbangan(Request $request, $id) {
        Timbangan::find($id)->update($request->all());
        return back()->with('success', 'Data Diupdate!');
    }

    public function destroyTimbangan($id) {
        Timbangan::find($id)->delete();
        return back()->with('success', 'Data Dihapus!');
    }
}
