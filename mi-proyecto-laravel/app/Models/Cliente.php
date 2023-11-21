<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;
    public $table = 'clientes';
     protected $fillable = [
    	'id',
    	'nombre',
    	'apellido',
    	'edad',
    	'ci',
    	'correo',
    	'fecha_nac',
    	'estado',
        'telefono',
        'id_cargo'
    ];
    public function cargo (){
        return $this->belongsTo('App\Models\cargo','id_cargo');
    }
}
