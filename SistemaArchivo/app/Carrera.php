<?php

namespace App;
use App\Estudiante;

use Illuminate\Database\Eloquent\Model;

class Carrera extends Model
{
     protected $fillable = [
        'codigo', 'nombre', 'localizacion',
    ];

    public function estudiante(){

		return $this->HasOne(Estudiante::class);
	}

	public function scopeCarrera($query, $carrera){
		if($carrera)
			return $query->where('nombre', 'LIKE',"%$carrera%");
	}
}
