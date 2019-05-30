<?php

namespace App;

use App\Estudiante;


use Illuminate\Database\Eloquent\Model;

class Expediente extends Model
{
    protected $fillable = [
        'fecha_ingreso', 'fecha_egreso', 'status', 'estudiante_id', 'archivo_id', 'gaveta_id',
    ];

    public function estudiante(){

		return $this->belongsTo(Estudiante::class);
	}

	//Scope

	public function scopeFecha_Ingreso($query, $fecha_ingreso){
		if($fecha_ingreso)
			return $query->where('fecha_ingreso', 'LIKE', "%$fecha_ingreso%");
	}

	public function scopeCi($query, $ci){
		if($ci)
			return $query->where('estudiante_id' , "$ci");
	}

	public function scopeStatus($query, $status){
		if($status)
			return $query->where('status', "$status");
	}

	
}
