<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $primaryKey = 'id_order';
    protected $fillable = [
        'nama_pelanggang',
        'no_meja',
        'no_hp',
        'id_menu',
        'porsi',
    ];
}
