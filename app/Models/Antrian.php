<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Antrian extends Model
{
    use HasFactory;

    protected $table = 'antrian';

    protected $fillable = ['id_antrian','total_harga', 'id_akun'];

    protected $attributes = [
        'tgl_transaksi' => '2023-05-28',
    ];
    
    public $timestamps = false;
    
}
