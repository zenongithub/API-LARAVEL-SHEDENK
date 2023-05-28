<?php

namespace App\Http\Controllers;
use App\Models\Simpan;
use Illuminate\Http\Request;

class SimpanController extends Controller
{
    public function tambah(Request $request){
   
        $cekproduk = Simpan::where('id_akun', $request->id_akun)
        ->where('id_produk', $request->id_produk)->first();

        if($cekproduk){
            return response()->json([
                "success" => "produk sudah ada",
            ]);
        }

        

        $simpan = Simpan::create([
            'id_produk'      => $request->id_produk,
            'id_akun'        => $request->id_akun,
        ]);

        if($simpan) {
            return response()->json([
                'success' => "Berhasil Menambahkan",
                'data'    => $simpan,  
            ]);
        }
        return response()->json([
            'success' => false,
        ], 409);
    }
    public function getData(Request $request)
    {
        $data = Simpan::where('id_akun', $request->id_akun)
        ->with('produk.gambar')
        ->with('produk.kategori')
        ->get();

        return response()->json($data);
    }
    
    public function hapusData(Request $request)
    {
        $hapus = Simpan::where('id_akun', $request->id_akun)
        ->where('id_produk',$request->id_produk)
        ->delete();

        return response()->json([
            "pesan" => 'Berhasil Menghapus'
        ]);
    }
}
