<?php

namespace App\Http\Controllers;
use App\Models\ProdukModel;
use Illuminate\Http\Request;

class ProdukController extends Controller
{   
    public function data(){

    $data = ProdukModel::with('gambar')
        ->with('kategori')
        ->get();

    return response()->json($data); 
    }
}
