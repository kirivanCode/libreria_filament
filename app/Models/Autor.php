<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Autor extends Model
{
    use HasFactory;

    protected $table = 'autors'; 

    protected $fillable = [
        'id',
        'nombres',
        'apellidos',
    ];

    public function libros()
    {
        return $this->hasMany(Libro::class, 'autor_id'); // Coincide con el campo en la tabla libros
    }
}
