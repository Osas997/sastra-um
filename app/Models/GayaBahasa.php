<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GayaBahasa extends Model
{
    /** @use HasFactory<\Database\Factories\GayaBahasaFactory> */
    use HasFactory;
    protected $table = 'gaya_bahasas';
    protected $fillable = [
        'contoh_kalimat',
        'frasa_kunci',
        'frasa_tipe',
        'makna_kiasan',
        'keterangan_konteks',
        'kategori',
    ];
}
