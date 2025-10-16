<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Categoria extends Model
{
    use HasFactory;

   protected $fillable = ['nombre_categoria', 'descripcion'];

    // Si tienes relación con libros:
    public function libros()
    {
        return $this->hasMany(Libro::class);
    }
}
