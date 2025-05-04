<?php

namespace App\Http\Controllers;


use App\Models\Producto;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::all();

        return view('productos.index', compact('productos'));


    }
    public function create()
{
    return view('productos.create');
}
public function store(Request $request)
{
    try {
        Producto::create([
            'nombre' => $request->nombre,
            'precio' => $request->precio,
            'stock'  => $request->stock
        ]);
        return redirect()->route('productos.index')->with('success','Registrado exitosamente');
    } catch (\Throwable $th) {
        Log::error('Error al crear producto: ' . $th->getMessage());
        return redirect()->route('productos.index')->with('error', 'Error al registrar');
    }
}
}

