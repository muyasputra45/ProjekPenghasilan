<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class barang extends Model
{
    protected $table='barang';
    use HasFactory;

    protected $fillable=[
        'kode_driver',
        'nama_driver',
        'alamat_driver',
        'notelp_driver',
    

    ];
}
