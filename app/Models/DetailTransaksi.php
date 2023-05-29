<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailTransaksi extends Model
{
    use HasFactory;

    protected $table = 'detail_transaksi';

    public function produk(){
        return $this->hasOne(ProdukModel::class, 'id_produk', 'id_produk');
    }
}
