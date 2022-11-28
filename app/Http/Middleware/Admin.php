<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;


class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public array $admin = array(
        1 =>"GETapi/rol",
        2 =>"POSTapi/rol",
        3 =>"PUTapi/rol",
        4 =>"DELETEapi/rol",
        5 =>"GETapi/categoria",
        6 =>"POSTapi/categoria",
        7 =>"PUTapi/categoria",
        8 =>"DELETEapi/categoria",
        9 =>"GETapi/post",
        10 =>"POSTapi/post",
        12 =>"DELETEapi/post",
        13 =>"GETapi/usuario",
        14 =>"POSTapi/usuario",
        15 =>"DELETEapi/usuario",
    );
    public $autor = array(
        1 =>"GETapi/post",
        2 =>"POSTapi/post",
        3 =>"DELETEapi/post",
        4 =>"PUTapi/post",
        5 =>"GETapi/categoria",
        6 =>"GETapi/usuario",
        7 =>"POSTapi/usuario",
        8 =>"PUTapi/usuario",
        9 =>"DELETEapi/usuario",
    );
    public $lector = array(
        1 =>"GETapi/post",
        3 =>"GETapi/categoria",
        4 =>"GETapi/usuario",
        5 =>"PUTapi/usuario",
    );
    public function handle(Request $request, Closure $next)
    {
        $key = env("JWT_SECRET");
        $mensaje = "No esta autorizado para acceder a esta ruta";

        $path = explode("/",$request->method().$request->path());
        $rutaValidar = $path[0]."/".$path[1];

        if(is_null($request->header('Authorization'))){
            return response($mensaje,401);
        }
        
        $jwt =explode(" ",$request->header('Authorization'))[1];
        $decoded = JWT::decode($jwt, new Key($key, 'HS256'));
        $array = json_decode(json_encode($decoded), true);

        if(!is_null($array["rol"]) && $array["rol"] != ""){
            if($array["rol"] == "ADMIN"){
                $indice = array_search($rutaValidar, $this->admin);
                if($indice){
                    return $next($request);
                }
                return response($mensaje,401);
            }
            if($array["rol"] == "AUTOR"){
                $indice = array_search($rutaValidar, $this->autor);
                if($indice){
                    return $next($request);
                }
                return response($mensaje,401);
            }
            if($array["rol"] == "LECTOR"){
                $indice = array_search($rutaValidar, $this->lector);
                if($indice){
                    return $next($request);
                }
                return response($mensaje,401);
            }
        }
        return response($mensaje,401);
    }
}
