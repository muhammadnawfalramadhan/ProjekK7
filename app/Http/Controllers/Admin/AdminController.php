<?php

namespace App\Http\Controllers\Admin;

use App\Models\HargaTbs;
use App\Models\Timbangan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class AdminController extends Controller
{
    // Dashboard Admin
    public function dashboard()
    {
        // Menampilkan data dashboard admin
        $totalTimbangans = Timbangan::count();
        $totalHarga = HargaTbs::sum('harga_perkg');

        return view('admin.pages.dashboard', compact('totalTimbangans', 'totalHarga'));
    }

    // Kelola Data Timbangan
    public function kelolaTimbangans()
    {
        $timbangans = Timbangan::all();
        $totalTbs = $timbangans->sum('berat'); // Menghitung total berat TBS
        $totalTransaksi = $timbangans->count(); // Menghitung jumlah transaksi

        // Mengambil data harga TBS hari ini (asumsi ada model untuk itu)
        $hargaTbsToday = HargaTbs::whereDate('tanggal', now()->toDateString())->first();

        return view('admin.pages.timbangan.index', compact('timbangans', 'totalTbs', 'totalTransaksi', 'hargaTbsToday'));
    }

    // Tambah Data Timbangan
    public function tambahTimbangan()
    {
        return view('admin.pages.timbangan.create');
    }

    // Simpan Data Timbangan
    public function simpanTimbangan(Request $request)
    {
        $request->validate([
            'nama_petani' => 'required',
            'berat' => 'required|numeric',
            'keterangan' => 'nullable',
        ]);

        Timbangan::create($request->all());

        return redirect()->route('admin.timbangan.index')->with('success', 'Data Timbangan berhasil disimpan.');
    }

    // Edit Data Timbangan
    public function editTimbangan($id)
    {
        $timbangan = Timbangan::findOrFail($id);
        return view('admin.pages.timbangan.edit', compact('timbangan'));
    }

    // Update Data Timbangan
    public function updateTimbangan(Request $request, $id)
    {
        $request->validate([
            'nama_petani' => 'required',
            'berat' => 'required|numeric',
            'keterangan' => 'nullable',
        ]);

        $timbangan = Timbangan::findOrFail($id);
        $timbangan->update($request->all());

        return redirect()->route('admin.timbangan.index')->with('success', 'Data Timbangan berhasil diperbarui.');
    }


    // Hapus Data Timbangan
    public function hapusTimbangan($id)
    {
        $timbangan = Timbangan::findOrFail($id);
        $timbangan->delete();

        return redirect()->route('admin.timbangan.index')->with('success', 'Data Timbangan berhasil dihapus.');
    }

    // Kelola Harga TBS
    public function kelolaHargaTbs()
    {
        // Ambil harga TBS terbaru berdasarkan tanggal hari ini
        $hargaTbsToday = HargaTbs::whereDate('tanggal', today())->first();  // Mengambil harga TBS hari ini

        $hargaTbs = HargaTbs::all();  // Ambil semua data harga TBS

        return view('admin.pages.harga.index', compact('hargaTbs', 'hargaTbsToday'));
    }

    // Tambah Data Harga TBS
    public function tambahHargaTbs()
    {
        return view('admin.pages.harga.create');
    }

    // Simpan Data Harga TBS
    public function simpanHargaTbs(Request $request)
    {
        $request->validate([
            'harga_perkg' => 'required|numeric',
            'tanggal' => 'required|date',
        ]);

        HargaTbs::create($request->all());

        return redirect()->route('admin.harga.index')->with('success', 'Harga TBS berhasil disimpan.');
    }

    // AdminController.php

    // Fungsi untuk menampilkan halaman edit harga TBS
    public function editHargaTbs($id)
    {
        // Mengambil data harga TBS berdasarkan ID
        $hargaTbs = HargaTbs::where('harga_id', $id)->firstOrFail();

        // Mengembalikan tampilan untuk halaman edit dengan membawa data hargaTbs
        return view('admin.pages.harga.edit', compact('hargaTbs'));
    }

    public function updateHargaTbs(Request $request, $id)
    {
        // Validasi input dari form
        $request->validate([
            'harga_perkg' => 'required|numeric',
            'tanggal' => 'required|date',
        ]);

        // Mengambil data harga TBS berdasarkan harga_id
        $hargaTbs = HargaTbs::where('harga_id', $id)->firstOrFail();

        // Mengupdate data harga TBS
        $hargaTbs->update($request->all());

        return redirect()->route('admin.harga.index')->with('success', 'Harga TBS berhasil diperbarui.');
    }

    // Hapus Data Harga TBS
    public function hapusHargaTbs($id)
    {
        // Cari data harga TBS berdasarkan harga_id
        $hargaTbs = HargaTbs::where('harga_id', $id)->firstOrFail();

        // Hapus data harga TBS
        $hargaTbs->delete();

        // Redirect kembali ke halaman daftar harga dengan pesan sukses
        return redirect()->route('admin.harga.index')->with('success', 'Harga TBS berhasil dihapus.');
    }


    // Kelola Data Pengguna
    public function kelolaPengguna()
    {
        $users = User::all();
        return view('admin.pages.pengguna.index', compact('users'));
    }

    // Edit Data Pengguna
    public function editPengguna($id)
    {
        $user = User::findOrFail($id);
        return view('admin.pages.pengguna.edit', compact('user'));
    }

    // Update Data Pengguna
    public function updatePengguna(Request $request, $id)
    {
        $request->validate([
            'username' => 'required|unique:users,username,' . $id,
            'password' => 'nullable|min:6',
            'role' => 'required',
        ]);

        $user = User::findOrFail($id);
        $user->update($request->all());

        return redirect()->route('admin.pages.pengguna.index')->with('success', 'Data Pengguna berhasil diperbarui.');
    }

    // Laporan
    public function laporan()
    {
        // Mengambil data laporan
        $laporan = Timbangan::all(); // Sesuaikan dengan data yang dibutuhkan untuk laporan
        return view('admin.pages.laporan.index', compact('laporan'));
    }
}
