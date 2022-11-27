<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\usuario;

class rol extends Model
{
    use HasFactory;

    protected $table = "rols";

    protected $fillable = [
        'id',
        'nombre'
    ];

    public function usuarios(){
        return $this->hasMany(usuario::class);
    }
}
