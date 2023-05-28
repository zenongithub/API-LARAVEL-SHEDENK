<?php

namespace App\Http\Controllers;
use App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Akun;
use Illuminate\Support\Facades\Validator;

class AkunController extends Controller
{
    public function autoID() 
    {
        $datas;
        $query = Akun::select(Akun::raw('max(id_akun) as max_code'))
        ->get();
        foreach($query as $data){
        $datas = $data->max_code;
        }
        $code = $datas;
                $urutan = (int)substr($code, 1, 3);
                $urutan++;
                $huruf = "U";
                $id_prod = $huruf . sprintf("%03s", $urutan);
        return $id_prod;
    }

    public function register (Request $request){
        {
            $validator = Validator::make($request->all(), [
                'nama'      => 'required',
                'email'     => 'required|email|unique:akuns,email',
                'password'  => 'required'
            ]);
    
            if ($validator->fails()) {
                return response()->json($validator->errors(), 422);
            }
    
            $user = Akun::create([
                'id_akun'   => $this->autoID(),
                'nama'      => $request->nama,
                'email'     => $request->email,
                'password'  => $request->password,
            ]);

            if($user) {
                return response()->json([
                    'success' => "Berhasil Register Silahkan Login Kembali",
                    'akun'    => $user,  
                ]);
            }
    
            return response()->json([
                'success' => false,
            ], 409);
        }
    }

    public function login (Request $request){
       
        $akun = Akun::where('email', $request->email)->first();
        
        if($akun){

            if($request->password == $akun->password){
                return response()->json([
                    "message" => "Sukses",
                    "user" => $akun
                ]);
            }
            return $this->error("Password Salah");
        }
        return $this->error("Email Tidak Terdaftar");
    }

    public function error($pesan){
        return response()->json([
            "succes" => 0,
            "message" => $pesan
        ]);
    }
}
