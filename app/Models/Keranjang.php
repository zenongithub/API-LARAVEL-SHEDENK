<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keranjang extends Model
{
    use HasFactory;

    protected $table = 'keranjang';

    protected $fillable = ['id_akun', 'id_produk'];

    public $timestamps = false;

    public function produk(){
        return $this->hasOne(ProdukModel::class, 'id_produk', 'id_produk');
    }
}
