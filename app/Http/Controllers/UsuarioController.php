<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\usuario;
use App\Models\rol;

class UsuarioController extends Controller
{
    //
    public function getAll(){
        return response()->json(usuario::all(),200);
    }

    public function getById($id){
        $usuario = usuario::find($id);

        //dd($usuario->rol);

        if(is_null($usuario)){
            return response()->json(["message"=>'Usuario no encontrado'], 404);
        };

        $newUser = [
            "id"=>$usuario->id, 
            "nombre"=>$usuario->nombre,
            "correo"=>$usuario->correo,
            "id_rol"=>$usuario->id_rol,
            "rol"=>$usuario->rol->nombre
        ];

        return response()->json($newUser, 200);
    }

    public function createUser(Request $request){
        $id_rol = $request->all()["id_rol"];
        $correo = $request->all()["correo"];
        $password = $request->all()["password"];
        $nombre = $request->all()["nombre"];

        if($id_rol == null || $correo == null || $password == null || $nombre == null){
            return response()->json(["message"=>'Los campos id_rol, correo, nombre y password son obligatorios'], 404);
        }

        $rol = rol::find($id_rol);

        if(is_null($rol)) return response()->json(["message"=>'El rol asociado no existe en la base de datos'], 404);

        $user =usuario::create($request->all());

        return response()->json($user, 200);

    }
    public function updateUser(Request $request, $id){
        $id_rol = $request->all()["id_rol"];
        $correo = $request->all()["correo"];
        $password = $request->all()["password"];
        $nombre = $request->all()["nombre"];

        if($id_rol == null || $correo == null || $password == null || $nombre == null){
            return response()->json(["message"=>'Los campos id_rol, correo, nombre y password son obligatorios'], 404);
        }

        $usuario = usuario::find($id);

        if(is_null($usuario)){
            return response()->json(["message"=>'El usuario no existe en la base de datos'], 404);
        }

        $usuarioUpdate = $usuario->update($request->all());

        return response()->json($usuarioUpdate, 200);
    }

    public function deleteUser($id){
        $usuario = usuario::find($id);

        if(is_null($usuario)){
            return response()->json(["message" => "El usuario que intenta eliminar no existe en la base de datos"], 404);
        }

        $usuario->delete();

        return response()-> json(["message" => "Usuario eliminado con exito"], 200);

    }
}
