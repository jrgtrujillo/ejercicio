<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
   protected $table='departamentos';
   protected $fillable=['nombre', 'id_pais'];

   // Consulta la tabla departamentos fitrados por pais
   public static function departamentos($id){
     return \App\Departamento::where('id_pais','=',$id)->get();
   }

}
