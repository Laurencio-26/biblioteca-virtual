<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;

    protected $fillable = [
        'codigo',
        'nombre',
    ];

    // Relación: un área tiene muchos libros
    public function libros()
    {
        return $this->hasMany(Libro::class);
    }
}
