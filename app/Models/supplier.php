<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class supplier extends Model
{
    use HasFactory;
    protected $table='suppliers';
    protected $fillable=[
        'nama_supplier',
        'jenis_barang',
        'fitur',
        'harga_beli',
        'jumlah_barang',
        'harga_total',
        'no_telp',
        'alamat'
    ];
}
