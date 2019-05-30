<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CarreraStoreRequest extends FormRequest
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
            'codigo' => 'required|numeric|max:999999',
            'nombre' => 'required|string|max:200',
        ];
    }
}
