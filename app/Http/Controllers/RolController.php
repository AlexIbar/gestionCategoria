<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\rol;

class RolController extends Controller
{
    
    public function getAll(Request $request){
        return response()->json(rol::all(),200);
    }

    public function getById($id){
        $rol = rol::find($id);

        if(is_null($rol)){
            return response()->json(["message"=>'Rol no encontrado'], 404);
        };

        return response()->json($rol, 200);
    }

    public function createRol(Request $request){
        $datos = $request->all()["nombre"];
        $tamanio = strlen($datos);
        if($tamanio < 3 || $tamanio > 20){
            return response()->json(["message" => "El rol no cumple con las condiciones minimas para que pueda ser creado, se requere minimo 3 caracteres y maximo 20"], 400);
        };

        $newRol = rol::create($request->all());
        
        if(is_null($newRol)){
            return response()-> json(["message" => "Ocurrio un error en la creación del rol, por favor intentarlo mas tarde"], 500);
        }

        return response()->json($newRol, 200);

    }

    public function updateRol(Request $request, $id){
        $datos = $request->all()["nombre"];
        $tamanio = strlen($datos);
        if($tamanio < 3 && $tamanio > 20){
            return response()->json(["message" => "El rol no cumple con las condiciones minimas para que pueda ser creado, se requere minimo 3 caracteres y maximo 20"], 304);
        };

        $rolfind = rol::find($id);

        if(is_null($rolfind)){
            return response()->json(["message" => "El rol que intenta actualizar no existe en la base de datos"], 404);
        }

        $rolfind->update($request->all());

        return response()->json($rolfind,200);

    }

    public function deleteRol($id){
        $rol = rol::find($id);

        if(is_null($rol)){
            return response()->json(["message" => "El rol que intenta eliminar no existe en la base de datos"], 404);
        }

        $rol->delete();

        return response()-> json(["message" => "Rol eliminado con exito"], 200);

    }


}
