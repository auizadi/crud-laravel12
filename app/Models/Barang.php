<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    //
    protected $fillable = [
        'nama_barang',
        'deskripsi',
        'harga_satuan',
        'jumlah',
        'foto'
    ];
}
