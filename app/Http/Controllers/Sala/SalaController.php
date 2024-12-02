<?php

namespace App\Http\Controllers\Sala;

use App\Http\Controllers\Controller;
use App\Models\Sala\Sala;
use Illuminate\Http\Request;

class SalaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sala = Sala::paginate(10);
        return view('Salas.index_sala', compact('sala'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Salas.create_sala');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'descripcion' => 'nullable|string|max:1000',
            'capacidad' => 'required',
        ]);
        $sala = Sala::create([
            'descripcion' => $validated['descripcion'],
            'capacidad' => $validated['capacidad'],
        ]);
        return redirect()->route('IndexSala')->with('success', 'Sala Creado con éxito.');
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
        $sala = Sala::findOrFail($id);
        return view('Salas.edit_sala', compact('sala'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'descripcion' => 'nullable|string|max:1000',
            'capacidad' => 'required',
        ]);
        $sala = Sala::findOrFail($id);
        $sala->update($request->all());
        return redirect()->route('IndexSala')->with('success', 'Sala Elimininado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $sala = Sala::findOrFail($id);
        $sala->delete();
        return redirect()->route('IndexSala')->with('success', 'Sala Elimininado correctamente.');
    }
}
