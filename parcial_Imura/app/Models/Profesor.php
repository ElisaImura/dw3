<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profesor extends Model
{
    use HasFactory;
    public $table = 'profesores';
        protected $fillable = [
            'id',
            'nombre',
            'apellido',
            'ci',
            'correo',
            'fecha_nac',
            'direccion',
            'profesion',
            'materia'
        ];
}
