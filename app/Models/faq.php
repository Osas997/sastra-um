<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class faq extends Model
{
    use HasFactory;
    protected $table = "faqs";
    protected $fillable = [
        'pertanyaan',
        'jawaban',
        'kategori',
        'tanggal',
        'status'
    ];
}
