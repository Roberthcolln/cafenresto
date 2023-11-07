<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;
    protected $table = 'team';
    protected $primaryKey = 'id_team';
    protected $fillable = [
        'nama_team',
        'jabatan_team',
        'jabatan_team',
        'foto_team',
        'facebook_team',
        'instagram_team',
    ];
}
