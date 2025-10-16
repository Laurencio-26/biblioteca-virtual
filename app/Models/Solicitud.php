<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solicitud extends Model
{
     use HasFactory;

     
    // 👇 Esto corrige el error de "solicituds"
    protected $table = 'solicitudes';

       protected $fillable = [
        'user_id',
    'libro_id',
    'nombre_libro', 
    'fecha_solicitud',
    'estado',
    'observaciones',
    ];

     // 🔗 Relación con el usuario
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // 🔗 Relación con el libro
    public function libro()
    {
        return $this->belongsTo(Libro::class);
    }
    
}
