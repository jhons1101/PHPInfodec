<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NotaRequest extends FormRequest
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
            'nom_estudiante' => 'required|string|max:100',
            'parcial1' => 'required|numeric',
            'parcial2' => 'required|numeric',
            'parcial3' => 'required|numeric',
        ];
    }
    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'nom_estudiante.required' => 'El nombre del estudiante es obligatorio',
            'nom_estudiante.string' => 'El campo nombre del estudiante solo permite caracteres alfabéticos',
            'nom_estudiante.max' => 'La longitud máxima del campo nombre del estudiante es 100 caracteres',
            'parcial1.required' => 'El parcial 1 es obligatorio',
            'parcial2.numeric' => 'El campo parcial 1 solo permite caracteres numéricos',
            'parcial3.required' => 'El parcial 2 es obligatorio',
            'parcial1.numeric' => 'El campo parcial 2 solo permite caracteres numéricos',
            'parcial2.required' => 'El parcial 3 es obligatorio',
            'parcial3.numeric' => 'El campo parcial 3 solo permite caracteres numéricos',
        ];
    }
}
