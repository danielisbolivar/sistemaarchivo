<?php

namespace App\Http\Controllers;
use App\Expediente;

class ReporteController extends Controller
{
	public function index()
    {
    	return view('reporte.index');
	}

	public function semanal()
    {
    	$fecha = date('Y-m-j');
		$nuevafecha = strtotime ('-1 week' , strtotime ( $fecha ));
		$nuevafecha = date('Y-m-j', $nuevafecha);
		$expedientes = Expediente::join('estudiantes', 'expedientes.estudiante_id', 'estudiantes.id')->join('carreras', 'estudiantes.carrera_id', 'carreras.id')->whereDate('fecha_egreso', $nuevafecha)->get();
		$pdf = \PDF::loadView('reporte.semanal', compact('expedientes'));
	    return $pdf->stream('Expediente semanal.pdf');
	}

	public function semanalD()
    {
    	$fecha = date('Y-m-j');
		$nuevafecha = strtotime ('-1 week' , strtotime ( $fecha ));
		$nuevafecha = date('Y-m-j', $nuevafecha);
		$expedientes = Expediente::join('estudiantes', 'expedientes.estudiante_id', 'estudiantes.id')->join('carreras', 'estudiantes.carrera_id', 'carreras.id')->whereDate('fecha_egreso', $nuevafecha)->get();
		$pdf = \PDF::loadView('reporte.semanal', compact('expedientes'));
	    return $pdf->download('Expediente semanal.pdf');
	}

	public function mensual()
    {
		$expedientes = Expediente::join('estudiantes', 'expedientes.estudiante_id', 'estudiantes.id')->join('carreras', 'estudiantes.carrera_id', 'carreras.id')->whereMonth('expendientes.created_at', date('m'))->get();
		$pdf = \PDF::loadView('reporte.mensual', compact('expedientes'));
	    return $pdf->stream('Expediente mensual.pdf');
	}

	public function mensualD()
    {
    	$fecha = date('Y-m-j');
		$nuevafecha = strtotime ('-1 month' , strtotime ( $fecha ));
		$nuevafecha = date('Y-m-j', $nuevafecha);
		$expedientes = Expediente::join('estudiantes', 'expedientes.estudiante_id', 'estudiantes.id')->join('carreras', 'estudiantes.carrera_id', 'carreras.id')->get();
		$pdf = \PDF::loadView('reporte.mensual', compact('expedientes'));
	    return $pdf->download('Expediente mensual.pdf');
	}

	public function anual()
    {
    	$fecha = date('Y-m-j');
		$nuevafecha = strtotime ('-1 year' , strtotime ( $fecha ));
		$nuevafecha = date('Y-m-j', $nuevafecha);
		$expedientes = Expediente::join('estudiantes', 'expedientes.estudiante_id', 'estudiantes.id')->join('carreras', 'estudiantes.carrera_id', 'carreras.id')->get();
		$pdf = \PDF::loadView('reporte.anual', compact('expedientes'));
	    return $pdf->stream('Expediente anual.pdf');
	}

	public function anualD()
    {
    	$fecha = date('Y-m-j');
		$nuevafecha = strtotime ('-1 year' , strtotime ( $fecha ));
		$nuevafecha = date('Y-m-j', $nuevafecha);
		$expedientes = Expediente::join('estudiantes', 'expedientes.estudiante_id', 'estudiantes.id')->join('carreras', 'estudiantes.carrera_id', 'carreras.id')->get();
		$pdf = \PDF::loadView('reporte.anual', compact('expedientes'));
	    return $pdf->download('Expediente anual.pdf');
	}
}
