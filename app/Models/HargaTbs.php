<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HargaTbs extends Model
{
    use HasFactory;

    // Tentukan nama tabel jika berbeda dengan plural model
    protected $table = 'harga_tbs';

    protected $primaryKey = 'harga_id';

    // Kolom yang dapat diisi
    protected $fillable = [
        'harga_perkg',  // Harga per kg TBS
        'tanggal',      // Tanggal harga TBS
    ];

    // Mendeklarasikan kolom tanggal sebagai kolom yang bertipe date
    protected $dates = ['tanggal'];

    // Relasi ke tabel Pembayaran (Jika dibutuhkan)
    public function pembayaran()
    {
        return $this->hasMany(Pembayaran::class, 'harga_id', 'harga_id');
    }

    // Accessor untuk memformat harga
    public function getFormattedHargaPerKgAttribute()
    {
        return 'Rp ' . number_format($this->harga_perkg, 0, ',', '.');
    }
}
