<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model
{
    protected $table='ciudads';
    protected $fillable=['nombre', 'id_departamento'];

    public static function ciudades($id){
      return \App\Ciudad::where('id_departamento','=',$id)->get();
    }
}
