<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Carbon\Carbon;

class FaqRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; // Asegúrate de que solo los usuarios autorizados puedan enviar este formulario
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
      return [
        'name' => 'required|string|max:255',
      ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
      return [
        'name.required' => 'El nombre de la pregunta es obligatorio',
        'name.string' => 'El tnombre de la pregunta debe ser una cadena de texto',
        'name.max' => 'El nombre de la pregunta no puede contener más de 255 caracteres',
      ];
    }
}