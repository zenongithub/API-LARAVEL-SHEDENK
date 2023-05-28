<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailAntrian extends Model
{
    use HasFactory;

    protected $table = 'detail_antrian';

    protected $fillable = ['id_antrian','id_produk'];
    
    public $timestamps = false;

    protected $attributes = [
        'kuantitas' => 1
    ];
}
