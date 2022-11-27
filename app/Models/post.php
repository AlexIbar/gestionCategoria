<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    use HasFactory;

    protected $table = "posts";

    protected $fillable = [
        'id',
        'titulo',
        'descripcion',
        'estado',
        'contenido',
        'id_categoria',
        'id_usuario'
    ];

    public function categoria(){
        return $this->belongsTo(categoria::class, 'id_categoria');
    }
    public function usuario(){
        return $this->belongsTo(usuario::class, 'id_usuario');
    }
}
