<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    /** @use HasFactory<\Database\Factories\AgendaFactory> */
    use HasFactory;
    protected $table = 'agendas';
    protected $fillable = [
        'judul',
        'tanggal',
        'waktu',
        'lokasi',
        'image',
        'deskripsi',
        'penyelenggara'
    ];
}
