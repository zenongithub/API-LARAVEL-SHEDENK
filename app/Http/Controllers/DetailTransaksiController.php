<?php

namespace App\Http\Controllers;
use App\Models\DetailTransaksi;
use Illuminate\Http\Request;

class DetailTransaksiController extends Controller
{
    public function getData(Request $request)
    {
        $data = DetailTransaksi::where('id_transaksi', $request->id_transaksi)
                        ->join('produk', 'produk.id_produk', '=', 'detail_transaksi.id_produk')
                        ->join('kategori', 'produk.id_kategori', '=', 'produk.id_kategori')
                        ->get();

        return response()->json($data);
    }
}
