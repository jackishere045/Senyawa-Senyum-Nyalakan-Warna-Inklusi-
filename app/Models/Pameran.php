<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pameran extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'nama_pemilik',
        'asal_pemilik',
        'deskripsi_karya',
        'gambar'
    ];
}
