<?php

namespace App;
use App\Carrera;
use App\Expediente;

use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
     protected $fillable = [
        'nacionalidad','ci', 'nombre', 'apellido', 'sexo', 'telefono', 'direccion', 'correo', 'carrera_id', 
    ];
    public function carrera(){

		return $this->belongsTo(Carrera::class);
	}

	public function expediente(){

		return $this->hasOne(Expediente::class);
	}

}
