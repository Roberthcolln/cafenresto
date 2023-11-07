<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    protected $table = 'menu';
    protected $primaryKey = 'id_menu';
    protected $fillable = [
        'nama_menu',
        'keterangan_menu',
        'gambar_menu',
        'harga_menu',
        'stok',
        'kategori_menu',
        'tanggal_masuk',
        'harga_pokok',
    ];
}
