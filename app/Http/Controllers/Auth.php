<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use App\Models\usuario;
use App\Models\rol;

class Auth extends Controller
{
    //

    public function login(Request $request){
        $dataSearch = $request->all();

        $user = usuario::select('id', 'correo', 'password')
        -> where('correo','=',$dataSearch["email"])
        ->get();

        $key = env("JWT_SECRET");

        if(count($user->all())==0){
            return response("El usuario no existe en la base de datos", 404);
        }

        if($user->all()[0]["password"] == $dataSearch["password"]){

            $userT = usuario::find($user->all()[0]["id"]);
            $rol = $userT->rol;
            $payload = ["rol" =>$rol["nombre"]];
    
            $jwt = JWT::encode($payload, $key, 'HS256');

            return response($jwt, 200);
        }
        return response("Usuario y/o contraseña errada", 400);
    }
}
