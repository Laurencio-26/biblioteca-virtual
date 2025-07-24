<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Categoria;

class Libro extends Model
{
    use HasFactory;

    protected $fillable = [
        'codigo_libro',
        'titulo',
        'autor',
        'editorial',
        'categoria_id',
        'estado',
        'ubicacion',
        'observaciones',
    ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }
}
