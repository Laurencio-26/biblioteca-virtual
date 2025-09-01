<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Categoria;
use App\Models\Area;

class Libro extends Model
{
    use HasFactory;

    protected $fillable = [
        'codigo_libro',
        'titulo',
        'autor',
        'editorial',
        'anio',
        'grado',
        'categoria_id',
        'area_id', // Relación con el área temática
        'estado',
        'ubicacion',
        'observaciones',
        'pdf',
    ];

    /**
     * Relación con la categoría.
     */
    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    /**
     * Relación con el área temática.
     */
    public function area()
{
    return $this->belongsTo(Area::class, 'area_id');
}
}
