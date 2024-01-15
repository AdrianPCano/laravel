<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Carbon\Carbon;

class BusinessProfileRequest extends FormRequest
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
        'commercial_name' => 'required|string|max:255',
        'email' => ['required','email','max:255', Rule::unique('business_profiles')->ignore($this->id)],
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
        'commercial_name.required' => 'El nombre es obligatorio',
        'commercial_name.string' => 'El nombre debe ser una cadena de texto',
        'commercial_name.max' => 'El nombre del evento no puede contener más de 255 caracteres',
        'email.required' => 'El email es obligatorio',
        'email.email' => 'El formato de email es incorrecto',
        'email.max' => 'El máximo de caracteres permitidos para el email son 255',
        'email.unique' => 'El email ya existe',
      ];
    }
}