<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class supplier extends Model
{
    protected $table='supplier';
    use HasFactory;
    protected $fillable=[

        'kode_supplier',
        'nama_supplier',
        'no_tlp',
        'alamat',
    ];
}
