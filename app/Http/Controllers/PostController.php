<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\post;
use App\Models\usuario;
use App\Models\categoria;

class PostController extends Controller
{
    //
    public function getAll(){
        return response()->json(post::all(),200);
    }

    public function getById($id){
        $post = post::find($id);

        if(is_null($post)){
            return response()->json(["message"=>'post no encontrado'], 404);
        };

        $post->usuario;
        $post->categoria;
        
        return response()->json($post, 200);
    }

    public function createPost(Request $request){
        $estado= 0;
        $requestCopy = $request->all();

        if(array_key_exists("estado", $request->all())){
            if($request->all()["estado"] == 1){
                $estado=1;
            }
        }
        $requestCopy["estado"] = $estado;
        $validar = $this->validarCreacion($request);
        if(!$validar){
            return response()->json("La informacion que ingreso no corresponde a la solicitada para que la creación del post sea ejecutada", 404);
        }

        $post =post::create($requestCopy);

        return response()->json($post, 200);

    }
    public function updatePost(Request $request, $id){
        $estado= 0;
        $requestCopy = $request->all();

        if(array_key_exists("estado", $request->all())){
            if($request->all()["estado"] == 1){
                $estado=1;
            }
        }
        $requestCopy["estado"] = $estado;
        $validar = $this->validarCreacion($request);

        if(!$validar){
            return response()->json("La informacion que ingreso no corresponde a la solicitada para que la creación del post sea actualizado", 404);
        }

        $post = post::find($id);

        if($post == null){
            return response()->json("El post que intenta actualizar no existe", 404);
        }

        $postUpdate = $post->update($requestCopy);

        return response()->json($postUpdate, 200);
    }

    public function deletePost($id){
        $post = post::find($id);

        if(is_null($post)){
            return response()->json(["message" => "El post que intenta eliminar no existe en la base de datos"], 404);
        }

        $post->delete();

        return response()-> json(["message" => "post eliminado con exito"], 200);

    }

    public function validarCreacion($request){
        $titulo = $request->all()["titulo"];
        $contenido = $request->all()["contenido"];
        $id_categoria = $request->all()["id_categoria"];
        $id_usuario = $request->all()["id_usuario"];

        if($titulo == null || $contenido == null || $id_categoria == null || $id_usuario == null){
            return false;
        }

        $categoria = categoria::find($id_categoria);
        $usuario = usuario::find($id_usuario);

        if(is_null($categoria) || is_null($usuario)) {
            return false;
        }
        return true;
    }
}
