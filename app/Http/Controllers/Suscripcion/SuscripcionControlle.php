<?php

namespace App\Http\Controllers\Suscripcion;

use App\Http\Controllers\Controller;
use App\Models\Suscripcion\Suscripcion;
use Illuminate\Http\Request;
use Livewire\Attributes\Validate;

class SuscripcionControlle extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $suscripcion = Suscripcion::paginate(10);
        return view('suscripcion.index_suscripcion', compact('suscripcion'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('suscripcion.create_suscripcion');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'descripcion' => 'required|string|max:255',
            'duracion' => 'required|integer|min:1',
            'costo' => 'required|numeric|min:0',
        ]);
        Suscripcion::create(
            [
                'descripcion' => $validate['descripcion'],
                'duracion' => $validate['duracion'],
                'costo' => $validate['costo'],
            ]
        );
        return redirect()->route('IndexSuscripcion')->with('success', 'suscripcion creada con exito');
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
        $suscripcion = Suscripcion::findOrFail($id);
        return view('suscripcion.edit_suscripcion', compact('suscripcion'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validate = $request->validate([
            'descripcion' => 'required|string|max:255',
            'duracion' => 'required|integer|min:1',
            'costo' => 'required|numeric|min:0',
        ]);
        $suscripcion = Suscripcion::findOrFail($id);
        $suscripcion->update([
            'descripcion' => $request->input('descripcion'),
            'duracion' => $request->input('duracion'),
            'costo' => $request->input('costo'),
        ]);
        return redirect()->route('IndexSuscripcion')->with('success','Suscripcion actualizada con exito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $suscripcion = Suscripcion::findOrFail($id);
        $suscripcion->delete();
        return redirect()->route('IndexSuscripcion')->with('success','sucripcion eliminado con exito');
    }
}
