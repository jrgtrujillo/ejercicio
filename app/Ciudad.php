<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model
{
    protected $table='ciudads';
    protected $fillable=['nombre', 'id_departamento'];
}
