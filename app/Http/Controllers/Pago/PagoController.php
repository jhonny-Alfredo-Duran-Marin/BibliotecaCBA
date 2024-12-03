<?php

namespace App\Http\Controllers\Pago;

use App\Http\Controllers\Controller;
use App\Models\Pago\Pago;
use Illuminate\Http\Request;

class PagoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pago = Pago::paginate(10);
        return view('pago.index_pago', compact('pago'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pago.create_pago');
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
        Pago::create([
            'descripcion' => $validated['descripcion'],
        ]);

        // Redirigir con un mensaje de éxito
        return redirect()->route('IndexPago')->with('success', 'Metodo de Pago creado correctamente.');
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
        $pago = Pago::findOrFail($id);
        return view('pago.edit_pago', compact('pago'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'descripcion' => 'required|string|max:255',
        ]);

        $pago = Pago::findOrFail($id);
        $pago->update([
            'descripcion' => $request->input('descripcion'),
        ]);

        return redirect()->route('IndexPago')->with('success', 'Metodo de Pago actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pago = Pago::findOrFail($id);
        $pago->delete();
        return redirect()->route('IndexPago')->with('success', 'Metodo de Pago eliminado correctamente.');
    }
}
