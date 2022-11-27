<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\categoria;

class CategoriaController extends Controller
{
    public function getAll(){
        return response()->json(categoria::all(),200);
    }

    public function getById($id){
        $categoria = categoria::find($id);

        if(is_null($categoria)){
            return response()->json(["message"=>'Categoria no encontrada'], 404);
        };

        return response()->json($categoria, 200);
    }

    public function createCategoria(Request $request){
        $datos = $request->all()["nombre"];

        $tamanio = $datos == null ? 0 :  strlen($datos);

        if($tamanio < 3 || $tamanio > 20){
            return response()->json(["message" => "El nombre de la categoria no cumple con las condiciones minimas para que pueda ser creada, se requere minimo 3 caracteres y no puede ser un valor nulo"], 400);
        };

        $newCategoria = categoria::create($request->all());
        
        if(is_null($newCategoria)){
            return response()-> json(["message" => "Ocurrio un error en la creación de la categoria, por favor intentarlo mas tarde"], 500);
        }

        return response()->json($newCategoria, 200);

    }

    public function updateCategoria(Request $request, $id){

        $datos = $request->all()["nombre"];
        $tamanio = strlen($datos);
        if($tamanio < 3 && $tamanio > 20){
            return response()->json(["message" => "El nombre de la categoria no cumple con las condiciones minimas para que pueda ser actualizado, se requere minimo 3 caracteres y no puede ser un valor nulo"], 304);
        };

        $categoriaFind = categoria::find($id);

        if(is_null($categoriaFind)){
            return response()->json(["message" => "La categoria que intenta actualizar no existe en la base de datos"], 404);
        }

        $categoriaFind->update($request->all());

        return response()->json($categoriaFind,200);

    }

    public function deleteCategoria($id){
        $categoria = categoria::find($id);

        if(is_null($categoria)){
            return response()->json(["message" => "La categoria que intenta eliminar no existe en la base de datos"], 404);
        }

        $categoria->delete();

        return response()-> json(["message" => "Categoria eliminada con exito"], 200);

    }
}
