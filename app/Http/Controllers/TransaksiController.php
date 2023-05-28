<?php

namespace App\Http\Controllers;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function getData(Request $request)
    {
        $data = Transaksi::where('id_akun', $request->id_akun)
                        // ->join('produk', 'produk.id_produk', '=', 'simpan.id_produk')
                        // ->join('kategori', 'produk.id_kategori', '=', 'produk.id_kategori')
                        ->get();

        return response()->json($data);
    }
}
