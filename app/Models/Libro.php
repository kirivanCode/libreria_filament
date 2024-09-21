<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    use HasFactory;

    protected $table = 'libros';

    protected $fillable = [
        'id',
        'nombre',
        'autor_id',
        'editorials_id', // Falto aca el de editorials
    ];

    public function autor()
    {
        return $this->belongsTo(Autor::class, 'autor_id');
    }

    public function editorial()
    {
        return $this->belongsTo(Editorial::class, 'editorials_id'); // debe coincidir
    }
}