<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reporte extends Model
{
    protected $fillable = 
    ['nombre',
     'tipo', 
     'tabla',
     'descripcion',
     'fecha_inicio'=> 'date',
     'fecha_fin' => 'date',
      'parametros'  => 'json',

    ];

}
