<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\BuktiPembayaran;

class PembayaranController extends Controller
{
    public function add(Request $request){

            $gambar = $request->file('gambar');
            $simpan = BuktiPembayaran::insert([
                'id_antrian' => $request->id_antrian,
                'nama_pembayaran' => $gambar->getClientOriginalName(),
            ]);
            $destinationPath = public_path().'/upload' ;
            $gambar->move($destinationPath,$gambar->getClientOriginalName());

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
}
