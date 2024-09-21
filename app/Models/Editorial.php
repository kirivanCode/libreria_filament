<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Editorial extends Model
{
    use HasFactory;

    protected $table = 'editorials'; 

    protected $fillable = [
        'id',
        'nombre',
        'pais',
        'mail',
    ];

    public function libros()
    {
        return $this->hasMany(Libro::class, 'editorials_id'); // nombre igual
    }
}
