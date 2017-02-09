<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Correo extends Model
{
    protected $table='correos';
    protected $fillable=['destino', 'asunto', 'mensaje', 'id_user', 'remite'];

    public static function noenviados(){
      return \App\Correo::where('enviado','=','0')->get();
    }
}
