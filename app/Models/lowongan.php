<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lowongan extends Model
{
    use HasFactory;

    protected $table = 'lowongan'; // 👈 Tulis manual nama tabelnya!

    protected $fillable = [
        'judul',
        'perusahaan',
        'lokasi',
        'gambar',
        'deskripsi',
        'cara_melamar'];
}
