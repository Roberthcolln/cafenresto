<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $table = 'project';
    protected $primaryKey = 'id_project';
    protected $fillable = [
        'nama_project',
        'gambar_project',
        'keterangan_project',
        'info_project',
        'url_project',
        'slug_project',
    ];
}
