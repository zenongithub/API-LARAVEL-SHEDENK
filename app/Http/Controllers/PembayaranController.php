<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\BuktiPembayaran;

class PembayaranController extends Controller
{
    public function add(Request $request){

        $cekdata = BuktiPembayaran::where('id_antrian', $request->id_antrian)->first();

        if($cekdata){
            return response()->json([
                "success" => "bukti pembayaran sudah ada",
            ]);
        }

            $gambar = $request->file('gambar');
            $simpan = BuktiPembayaran::create([
                'id_antrian' => $request->id_antrian,
                'nama_pembayaran' => $gambar->getClientOriginalName(),
            ]);
            $destinationPath = public_path().'/upload' ;
            $gambar->move($destinationPath,$gambar->getClientOriginalName());

            if($simpan) {
                return response()->json([
                    'success' => "Berhasil Menambahkan",
                    'data'    => [$simpan],  
                ]);
            }
            return response()->json([
                'success' => false,
            ], 409);
    }
    function datagambar(Request $request){
        $data = BuktiPembayaran::where('id_antrian', $request->id_antrian)
        ->get();

        return response()->json($data);
    }
}
