<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Citraan extends Model
{
    /** @use HasFactory<\Database\Factories\CitraanFactory> */
    use HasFactory;
    protected $table = 'citraans';
    protected $fillable = [
        'lanskap',
        'data',
        'domain_sumber',
        'domain_makna',
        'konteks',
        'kategori',
    ];
}
