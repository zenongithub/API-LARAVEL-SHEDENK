<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_akun'   => 'required',
            'nama'      => 'required',
            'password'  => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        $user = User::where('id_akun', $request->id_akun)
                    ->update([
                        'nama'      => $request->nama,
                        'password'  => $request->password,
                        ]);

        if($user) {
            return response()->json([
                'success' => "Berhasil Update",
                'akun'    => $user,  
            ]);
        }

        return response()->json([
            'success' => false,
        ], 409);
    }
}
