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
    );
    public $autor = array(
        0 =>"GETapi/",
        0 =>"POSTapi/",
        0 =>"PUTapi/",
        0 =>"DELETEapi/",
    );
    public $lector = array(
        0 =>"GETapi/",
        0 =>"POSTapi/",
        0 =>"PUTapi/",
        0 =>"DELETEapi/",
    );
    public function handle(Request $request, Closure $next)
    {
        $key = env("JWT_SECRET");

        $path = explode("/",$request->method().$request->path());
        $rutaValidar = $path[0]."/".$path[1];

        if(is_null($request->header('Authorization'))){
            return response("No esta autorizado para acceder a esta ruta",401);
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
                return response("No esta autorizado para acceder a esta ruta",401);
            }
            if($array["rol"] == "AUTOR"){
                $indice = array_search($rutaValidar, $this->autor);
                if($indice){
                    return $next($request);
                }
                return response("No esta autorizado para acceder a esta ruta",401);
            }
            if($array["rol"] == "LECTOR"){
                $indice = array_search($rutaValidar, $this->lector);
                if($indice){
                    return $next($request);
                }
                return response("No esta autorizado para acceder a esta ruta",401);
            }
        }
        return response("No esta autorizado para acceder a esta ruta",401);
    }
}
