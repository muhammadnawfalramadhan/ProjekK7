<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;

    protected $table = 'pembayaran';  // Nama tabel pembayaran

    protected $fillable = [
        'timbangans_id',  // Relasi ke timbangan
        'harga_id',
        'total_berat',
        'harga_perkg',
        'total_bayar',
        'status',
        'tanggal_transaksi',
    ];

    // Relasi ke HargaTbs
    public function hargaTbs()
    {
        return $this->belongsTo(HargaTbs::class, 'harga_id', 'harga_id');
    }

    // Relasi ke Timbangan
    public function timbangan()
    {
        return $this->belongsTo(Timbangan::class, 'timbangans_id', 'id');  // Relasi menggunakan timbangan_id
    }

    // Fungsi untuk menghitung total bayar
    public function hitungTotalBayar()
    {
        $harga_per_kg = $this->hargaTbs ? $this->hargaTbs->harga_perkg : 0;
        $total_berat = $this->total_berat;

        return $harga_per_kg * $total_berat;
    }
}
