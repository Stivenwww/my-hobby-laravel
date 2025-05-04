<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    // Especifica el nombre de la tabla
    protected $table = 'categoria';
    protected $primaryKey = 'id';

    protected $fillable = [
        'nombre',
        'descripcion',
    ];
}
