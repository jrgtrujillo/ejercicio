<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ActualizarUsuarioRequest extends Request
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

     // Reglas de validacion para la actualizcion de los usuarios
    public function rules()
    {
        return [
          'nombre'=>'required',
          'correo'=>'required|email',
          'ciudad'=>'required',
        ];
    }
}
