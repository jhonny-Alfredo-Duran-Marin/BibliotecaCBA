<?php

namespace App\Http\Controllers\Material;

use App\Http\Controllers\Controller;
use App\Models\Material\TipoMaterial;
use Illuminate\Http\Request;

class TipoMaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tiposMateriales = TipoMaterial::paginate(3); // Obtener todos los tipos de materiales
        return view('materiales.index_tipo_material', compact('tiposMateriales'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('materiales.create_tipo_material');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
          // Validar los datos enviados
    $validated = $request->validate([
        'descripcion' => 'required|string|max:255', // Valida que descripción es requerida
    ]);

    // Crear un nuevo registro
    TipoMaterial::create([
        'descripcion' => $validated['descripcion'],
    ]);

    // Redirigir con un mensaje de éxito
    return redirect()->route('indexTipoMaterial')->with('success', 'Tipo de material creado correctamente.');
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
        $tipomaterial = TipoMaterial::findOrFail($id);
        return view('materiales.edit_tipo_material', compact('tipomaterial'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'descripcion' => 'required|string|max:255',
        ]);

        $tipoMaterial = TipoMaterial::findOrFail($id);
        $tipoMaterial->update([
            'descripcion' => $request->input('descripcion'),
        ]);

        return redirect()->route('indexTipoMaterial')->with('success', 'Tipo de material actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tipoMaterial = TipoMaterial::findOrFail($id);
        $tipoMaterial->delete();
        return redirect()->route('indexTipoMaterial')->with('success', 'Tipo de material Elimininado correctamente.');
    }
}
