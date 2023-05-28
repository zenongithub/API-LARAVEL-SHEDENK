<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ProdukModel extends Model
{
    use HasFactory;

    protected $table = 'produk';

    public function gambar(){
        return $this->hasMany(Gambar::class, 'id_produk', 'id_produk');
    }

    public function kategori(){
        return $this->hasOne(Kategori::class, 'id_kategori', 'id_kategori');
    }
}
