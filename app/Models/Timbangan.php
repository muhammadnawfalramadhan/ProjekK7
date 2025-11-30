<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Timbangan extends Model
{
    use HasFactory;

    protected $table = 'timbangans';

    protected $fillable = [
        'tukang_id',
        'nama_petani',
        'berat',
        'keterangan'
    ];
}
