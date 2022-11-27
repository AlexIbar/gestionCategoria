<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\rol;

class usuario extends Model
{
    use HasFactory;

    protected $table = "usuarios";

    protected $fillable = [
        'id',
        'nombre',
        'correo',
        'password',
        'id_rol'
    ];

    public function rol(){
        return $this->belongsTo(rol::class,  'id_rol');
    }
    public function post(){
        return $this->hasMany(post::class);
    }
}
