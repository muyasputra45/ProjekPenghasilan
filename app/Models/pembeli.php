<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pembeli extends Model
{
    protected $table='pembeli';
    use HasFactory;
    protected $fillable=[

        'nama_pembeli',
        'no_tlp',
        'alamat',
        'no_member',
    ];
}
