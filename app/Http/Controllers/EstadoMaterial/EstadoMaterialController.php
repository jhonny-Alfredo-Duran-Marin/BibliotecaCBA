<?php

namespace App\Http\Controllers\EstadoMaterial;

use App\Http\Controllers\Controller;
use App\Models\EstadoMaterial\EstadoMaterial;
use Illuminate\Http\Request;

class EstadoMaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $estadoMateriales = EstadoMaterial::paginate(10); // Obtener todos los tipos de materiales
        return view('estado_materiales.index_estado_material', compact('estadoMateriales'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('estado_materiales.create_estado_material');//
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
        EstadoMaterial::create([
            'descripcion' => $validated['descripcion'],
        ]);

        // Redirigir con un mensaje de éxito
        return redirect()->route('indexEstadoMaterial')->with('success', 'Estado de material creado correctamente.');
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
        $estadomaterial = EstadoMaterial::findOrFail($id);
        return view('estado_materiales.edit_estado_material', compact('estadomaterial'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'descripcion' => 'required|string|max:255',
        ]);

        $estadoMaterial = EstadoMaterial::findOrFail($id);
        $estadoMaterial->update([
            'descripcion' => $request->input('descripcion'),
        ]);

        return redirect()->route('indexEstadoMaterial')->with('success', 'Estado de material actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $estadoMaterial = EstadoMaterial::findOrFail($id);
        $estadoMaterial->delete();
        return redirect()->route('indexEstadoMaterial')->with('success', 'Estado de material Elimininado correctamente.');
    }
}
