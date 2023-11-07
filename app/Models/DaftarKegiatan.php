<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DaftarKegiatan extends Model
{
    use HasFactory;
    protected $table = 'daftar_kegiatans';
    protected $primaryKey = 'id_daftar_kegiatan';
    public $timestamps = true;
    protected $fillable = [
        
        'id_kegiatan',
        'nama',
        'no_tlp',
        'bukti_pendaftaran',
        'tanggal_kegiatan',
        'biaya_kegiatan'
    ];
    // public function daftar_kegiatan()
    // {
    //     return $this->belongsTo(DaftarKegiatan::class);
    // }
}
