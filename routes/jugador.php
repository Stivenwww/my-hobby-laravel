<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jugador extends Model
{
    use HasFactory;

    protected $table = 'jugadores'; // Nombre de la tabla en la base de datos

    protected $fillable = ['nombre', 'edad', 'posicion', 'equipo']; // Campos permitidos para asignación masiva
}
