<?php

namespace App\Http\Controllers\Donacion;

use App\Http\Controllers\Controller;
use App\Models\Donacion\Donacion;
use App\Models\Donante\Donante;
use Illuminate\Http\Request;

class DonacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $donacion = Donacion::paginate(10);

        return view('donacion.index_donacion', compact('donacion'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $donante = Donante::pluck('Nombre','id')->toArray();
        return view('donacion.create_donacion', compact('donante'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'descripcion' => 'nullable|string|max:1000',
            'fecha' => 'required|date',
            'donante_id' => 'required|exists:donantes,id',
        ]);


        $donacion = Donacion::create([
            'descripcion' => $validated['descripcion'],
            'fecha' => $validated['fecha'],
            'donante_id' => $validated['donante_id'],
        ]);

        return redirect()->route('IndexDonacion')->with('success', 'Donacion Creado con éxito.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $donacion = Donacion::with('donante')->findOrFail($id); // Carga la relación 'donantes'
        return view('donacion.show_donacion', compact('donacion'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $donacion = Donacion::findOrFail($id);
        $donante = Donante::pluck('Nombre','id')->toArray();
        return view('donacion.edit_donacion', compact('donante','donacion'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'fecha' => 'required|date',
            'descripcion' => 'nullable|string',
            'donante_id' => 'required|exists:donantes,id',
        ]);
        $donacion = Donacion::findOrFail($id);
        $donacion->update([
            'fecha' => $request->fecha,
            'descripcion' => $request->descripcion,
            'donante_id' =>$request->donante_id,
        ]);
        return redirect()->route('IndexDonacion')->with('success', 'Donacion Actualizada con éxito.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $donacion = Donacion::findOrFail($id);
        $donacion->delete();

        return redirect()->route('IndexDonacion')->with('success', 'Donacion Eliminada con éxito.');
    }
}
