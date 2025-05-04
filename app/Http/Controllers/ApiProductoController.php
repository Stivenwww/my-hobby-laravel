<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ApiProductoController extends Controller
{

    // GET /api/productos
    public function index()
    {
        $productos = Producto::all();
        return response()->json($productos, 200);
    }

    // GET /api/productos/{id}
    public function show($id)
    {
        $producto = Producto::find($id);

        if ($producto) {
            return response()->json($producto, 200);
        } else {
            return response()->json(['error' => 'Producto no encontrado'], 404);
        }
    }

    // POST /api/productos
    public function store(Request $request)
    {
        $producto = Producto::create([
            'nombre' => $request->nombre,
            'precio' => $request->precio,
            'stock'  => $request->stock,
        ]);
        return response()->json($producto, 201);
    }

    // PUT /api/productos/{id}
    public function update(Request $request, $id)
    {
        $producto = Producto::find($id);

        if ($producto) {
            $producto->update($request->all());
            return response()->json($producto, 200);
        } else {
            return response()->json(['error' => 'Producto no encontrado'], 404);
        }
    }

    // DELETE /api/productos/{id}
    public function destroy($id)
    {
        $producto = Producto::find($id);

        if ($producto) {
            $producto->delete();
            return response()->json(null, 204);
        } else {
            return response()->json(['error' => 'Producto no encontrado'], 404);
        }
    }
}
