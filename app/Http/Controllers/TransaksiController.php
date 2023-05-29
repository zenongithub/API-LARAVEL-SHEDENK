<?php

namespace App\Http\Controllers;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function getData(Request $request)
    {
        $data = Transaksi::where('id_akun', $request->id_akun)
                        ->get();

        return response()->json($data);
    }
}
