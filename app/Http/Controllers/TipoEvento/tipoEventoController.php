<?php

namespace App\Http\Controllers\TipoEvento;

use App\Http\Controllers\Controller;
use App\Models\TipoEvento\TipoEvento;
use Illuminate\Http\Request;

class tipoEventoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tipoEvento = TipoEvento::paginate(10); // Obtener todos los tipos de materiales
        return view('TipoEvento.index_tipo_evento', compact('tipoEvento'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('TipoEvento.create_tipo_evento');
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
        TipoEvento::create([
            'descripcion' => $validated['descripcion'],
        ]);

        // Redirigir con un mensaje de éxito
        return redirect()->route('indexTipoEvento')->with('success', 'Tipo de evento creado correctamente.');
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
        $tipoevento = TipoEvento::findOrFail($id);
        return view('TipoEvento.edit_tipo_evento', compact('tipoevento'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'descripcion' => 'required|string|max:255',
        ]);

        $tipoEvento = TipoEvento::findOrFail($id);
        $tipoEvento->update([
            'descripcion' => $request->input('descripcion'),
        ]);

        return redirect()->route('indexTipoEvento')->with('success', 'Tipo de evento actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tipoEvento = TipoEvento::findOrFail($id);
        $tipoEvento->delete();
        return redirect()->route('indexTipoEvento')->with('success', 'Tipo de evento Elimininado correctamente.');
    }

}
