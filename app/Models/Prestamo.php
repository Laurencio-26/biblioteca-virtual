<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Libro;

class Prestamo extends Model
{
    use HasFactory;

   protected $fillable = [
    'usuario_id',
    'libro_id',
    'fecha_prestamo',
    'fecha_devolucion',
    'estado',
    'grado',
    'seccion',
    'turno',
    'institucion',
];


    // Relación con el modelo User (usuario)
    public function usuario()
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }

    // Relación con el modelo Libro
    public function libro()
    {
        return $this->belongsTo(Libro::class, 'libro_id');
    }
}
