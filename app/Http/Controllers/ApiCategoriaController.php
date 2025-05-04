<?php

namespace App\Http\Controllers;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class ApiCategoriaController extends Controller
{
     // Listar todas las categorías.
    public function index(): JsonResponse
    {
        $categorias = Categoria::all();
        return response()->json($categorias);
    }
   // Crear nueva categoria
    public function store(Request $request): JsonResponse
    {
        $data = $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
        ]);

        $categoria = Categoria::create($data);

        return response()->json($categoria, 201);
    }

    //Mostrar categoria por ID
    public function show(int $id): JsonResponse
    {
        $categoria = Categoria::findOrFail($id);
        return response()->json($categoria);
    }

    // Actualizar categoria por ID
    public function update(Request $request, int $id): JsonResponse
    {
        $categoria = Categoria::findOrFail($id);

        $data = $request->validate([
            'nombre' => 'sometimes|required|string|max:255',
            'descripcion' => 'sometimes|nullable|string',
        ]);

        $categoria->update($data);

        return response()->json($categoria);
    }

//Eliminar una categoria por ID
public function destroy(int $id): JsonResponse
{
    $categoria = Categoria::findOrFail($id);
    $categoria->delete();

    return response()->json(['message' => 'Categoría eliminada correctamente', 'categoria' => $categoria], 200);
}
}
