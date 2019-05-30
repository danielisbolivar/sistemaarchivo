<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EstudianteUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
             'nacionalidad' => 'required',
            'ci' => 'required|min:1000000|max:99999999|integer|unique:estudiantes,ci,' . $this->estudiante,
            'nombre' => 'required|string|max:100',
            'apellido' => 'required|string|max:100',
            'sexo'      => 'required|in:femenino,masculino',
            'telefono' => 'required|min:10|max:11',
            'direccion' => 'required|string|max:200',
            'correo' => 'required|string|max:70|unique:estudiantes,correo,' . $this->estudiante,
            'carrera_id' => 'required|integer',
        ];

       
    }
}
