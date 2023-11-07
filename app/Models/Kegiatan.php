<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    use HasFactory;
    protected $table = 'kegiatans';
    protected $primaryKey = 'id_kegiatan';
    public $timestamps = true;
    protected $fillable = [
        
        'nama_kegiatan',
        'deskripsi_kegiatan',
        'gambar_kegiatan',
        'tanggal_kegiatan',
        'jam_kegiatan',
        'biaya_kegiatan',
        'slug_kegiatan'
    ];
}
