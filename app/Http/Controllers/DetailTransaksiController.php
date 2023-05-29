<?php

namespace App\Http\Controllers;
use App\Models\DetailTransaksi;
use Illuminate\Http\Request;

class DetailTransaksiController extends Controller
{
    public function getData(Request $request)
    {
        $data = DetailTransaksi::where('id_transaksi', $request->id_transaksi)
        ->with('produk.gambar')
        ->with('produk.kategori')
        ->get();

        return response()->json($data);
    }
}
