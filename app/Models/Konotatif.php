<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Konotatif extends Model
{
    /** @use HasFactory<\Database\Factories\KonotatifFactory> */
    use HasFactory;

    protected $table = 'konotatifs';

    protected $fillable = [
        'nomina',
        'nomina2',
        'verba',
        'adjektiva',
        'adverbia',
        'kata_konotatif',
        'contoh_penggunaan',
        'makna',
        'fungsi',
        'konteks',
        'kategori',
    ];

    public function scopeFilter($query, $search = null, $category = null)
    {
        if ($search) {
            $query->where('kata_konotatif', 'like', '%' . $search . '%');
        }

        if ($category) {
            $query->where('kategori', $category);
        }
    }
}
