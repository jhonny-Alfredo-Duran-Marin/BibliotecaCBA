<?php

namespace App\Http\Controllers\CategoriaMaterial;

use App\Http\Controllers\Controller;
use App\Models\CategoriaMaterial\CategoriaMaterial;
use Illuminate\Http\Request;

class CategoriaMaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categoriaMateriales = CategoriaMaterial::paginate(10); // Obtener todos los tipos de materiales
        return view('categoria_materiales.index_categoria_materiales', compact('categoriaMateriales'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categoria_materiales.create_categoria_materiales');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'descripcion' => 'required|string|max:255', // Valida que descripción es requerida
        ]);

        // Crear un nuevo registro
        CategoriaMaterial::create([
            'descripcion' => $validated['descripcion'],
        ]);

        // Redirigir con un mensaje de éxito
        return redirect()->route('indexCategoriaMaterial')->with('success', 'Categoria de material creado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categoriamaterial = CategoriaMaterial::findOrFail($id);
        return view('categoria_materiales.edit_categoria_materiles', compact('categoriamaterial'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'descripcion' => 'required|string|max:255',
        ]);

        $categoriaMaterial = CategoriaMaterial::findOrFail($id);
        $categoriaMaterial->update([
            'descripcion' => $request->input('descripcion'),
        ]);

        return redirect()->route('indexCategoriaMaterial')->with('success', 'Categoria de material actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $categoriaMaterial = CategoriaMaterial::findOrFail($id);
        $categoriaMaterial->delete();
        return redirect()->route('indexCategoriaMaterial')->with('success', 'Categoria de material Elimininado correctamente.');
    }
}
