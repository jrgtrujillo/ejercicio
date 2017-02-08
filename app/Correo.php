<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Correo extends Model
{
    protected $table='correos';
    protected $fillable=['destino', 'mensaje', 'id_user', 'remite'];
}
