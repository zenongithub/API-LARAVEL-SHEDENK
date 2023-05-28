<?php

namespace App\Http\Controllers;
use App\Models\Keranjang;
use Illuminate\Http\Request;

class KeranjangController extends Controller
{
    public function tambah(Request $request){

        $cekproduk = Keranjang::where('id_akun', $request->id_akun)
        ->where('id_produk', $request->id_produk)->first();

        if($cekproduk){
            return response()->json([
                "success" => "produk sudah ada",
            ]);
        }
        $keranjang = Keranjang::create([
            'id_produk'      => $request->id_produk,
            'id_akun'        => $request->id_akun,
        ]);

        if($keranjang) {
            return response()->json([
                'success' => "Berhasil Menambahkan",
                'data'    => $keranjang,  
            ]);
        }
        return response()->json([
            'success' => false,
        ], 409);
    }

    public function getData(Request $request)
    {
        $data = Keranjang::where('id_akun', $request->id_akun)
        ->with('produk.gambar')
        ->with('produk.kategori')
        ->get();

        return response()->json($data);
    }
    
    public function hapusData(Request $request)
    {
        $hapus = Keranjang::where('id_akun', $request->id_akun)
        ->where('id_produk',$request->id_produk)
        ->delete();

        return response()->json([
            "pesan" => 'Berhasil Menghapus'
        ]);
    }
}
