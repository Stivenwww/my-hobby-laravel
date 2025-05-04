<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    // nombre de la tabla
    protected $table ='productos';
    //nombre de la primary key
    protected $primarykey ='id';
    //definir los atributos
    protected $fillable = [
        'nombre',
        'precio',
        'stock',
    ];

}
