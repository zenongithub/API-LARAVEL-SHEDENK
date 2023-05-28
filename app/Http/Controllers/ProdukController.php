<?php

namespace App\Http\Controllers;
use App\Models\ProdukModel;
use Illuminate\Http\Request;

class ProdukController extends Controller
{   
    public function data(){

    // $data = ProdukModel::join('kategori', 'produk.id_kategori', '=', 'kategori.id_kategori')
    //                     ->join('gambar', 'produk.id_produk', '=', 'gambar.id_produk')
    //                     ->get();

    $data = ProdukModel::with('gambar')
        ->with('kategori')
        ->get();

    return response()->json($data); 
    }
}
