<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;
    protected $table = 'berita';
    protected $primaryKey = 'id_berita';
    protected $fillable = [
        'judul_berita',
        'isi_berita',
        'id_team',
        'gambar_berita',
        'tanggal_berita',
        'slug_berita',
    ];
}
