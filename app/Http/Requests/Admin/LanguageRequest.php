<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Carbon\Carbon;

class LanguageRequest extends FormRequest
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
        'label' => 'required|string|max:255',
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
        'name.required' => 'El nombre del idioma es obligatorio',
        'name.string' => 'El nombre del idioma debe ser una cadena de texto',
        'name.max' => 'El nombre del idioma no puede contener más de 255 caracteres',
        'label.required' => 'La abreviatura del idioma es obligatorio',
        'label.string' => 'La abreviatura del idioma debe ser una cadena de texto',
        'label.max' => 'La abreviatura no puede contener más de 255 caracteres',
      ];
    }
}