<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $table = 'setting';
    protected $primaryKey ='id_setting';
    protected $fillable = [
        'instansi_setting',
        'pimpinan_setting',
        'logo_setting',
        'favicon_setting',
        'tentang_setting',
        'misi_setting',
        'visi_setting',
        'keyword_setting',
        'alamat_setting',
        'instagram_setting',
        'youtube_setting',
        'email_setting',
        'no_hp_setting',
        'maps_setting',
    ];
}
