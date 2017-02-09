<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CrearUsuarioRequest extends Request
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
     // Reglas de validacion para la creacion de usuarios
    public function rules()
    {
        return [
            'nombre'=>'required',
            'correo'=>'required|unique:usuarios|email',
            'ciudad'=>'required',
        ];
    }
}
