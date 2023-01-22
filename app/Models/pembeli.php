<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pembeli extends Model
{
    use HasFactory;
    protected $table='pembelis';
    protected $fillable=[
        'No',
        'Nama_Pembeli',
        'Jenis_Handphone'
    ];
}
