<?php

namespace App\Http\Controllers;
use App\Models\Antrian;
use App\Models\DetailAntrian;
use App\Models\BuktiPembayaran;
use App\Models\Keranjang;
use Illuminate\Http\Request;

class AntrianController extends Controller
{
    public function getdata(Request $request)
    {
        $data = Antrian::where('id_akun', $request->id_akun)
                        ->get();

        return response()->json($data);
    }
    public function autoIDAn() 
    {
        $datas;
        $query = Antrian::select(Antrian::raw('max(id_antrian) as max_code'))
        ->get();
        foreach($query as $data){
        $datas = $data->max_code;
        }
        $code = $datas;
                $urutan = (int)substr($code, 1, 3);
                $urutan++;
                $huruf = "A";
                $id_ant = $huruf . sprintf("%03s", $urutan);
        return $id_ant;
    }

    public function tambah(Request $request)
    {
        $id_produk = json_decode($request->id_produk);
        $id = $this->autoIDAn();
        $simpan = Antrian::create([
            'id_antrian'      => $id,
            'total_harga'      => $request->total_harga,
            'total_barang'      => $request->total_barang,
            'id_akun'        => $request->id_akun,
        ]);

        for ($i=0; $i < count($id_produk); $i++) { 
            DetailAntrian::create([
                'id_antrian'      => $id,
                'id_produk'      => $id_produk[$i],
            ]);
        }
        $hapus = Keranjang::where('id_akun', $request->id_akun)->delete();
        
        if($simpan) {
            return response()->json([
                'success' => "Berhasil Menambahkan Antrian",
                'data'    => [$simpan],  
            ]);
        }
        return response()->json([
            'success' => false,
        ], 409);
    }
    public function hapus(Request $request)
    {

        $hapus = DetailAntrian::where('id_antrian',$request->id_antrian)
        ->delete();

        $hapus = Antrian::where('id_akun', $request->id_akun)
        ->where('id_antrian',$request->id_antrian)
        ->delete();

        $hapus = BuktiPembayaran::where('id_antrian', $request->id_antrian)->delete();

        return response()->json([
            "pesan" => 'Berhasil Menghapus'
        ]);
    }
}
