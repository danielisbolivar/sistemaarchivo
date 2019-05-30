<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExpedienteUpdateRequest extends FormRequest
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
            'fecha_ingreso' => 'required|date',
            'fecha_egreso' => '',
            'status' => 'required|in:Disponible,Retirado,Perdido,Prestado',
            'estudiante_id' => 'required|integer|unique:expedientes,estudiante_id,' . $this->expediente,
            'archivo_id' => 'required|integer',
            'gaveta_id' => 'required|integer',
        ];
    }
}
