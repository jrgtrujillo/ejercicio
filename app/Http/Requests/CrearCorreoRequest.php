<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CrearCorreoRequest extends Request
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
     // Reglas de actualizacion para la creacion de correos
    public function rules()
    {
        return [
          'mensaje'=>'required',
          'asunto'=>'required',
          'destino'=>'required|email',
        ];
    }
}
