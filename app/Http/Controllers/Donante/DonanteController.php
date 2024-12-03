<?php

namespace App\Http\Controllers\Donante;

use App\Http\Controllers\Controller;
use App\Models\Donante\Donante;
use Illuminate\Http\Request;

class DonanteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $donante = Donante::paginate(10);

        return view('Donante.index_donante', compact('donante'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Donante.create_donante');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => ['required', 'string', 'max:255'],
            'celular' => ['required', 'string', 'max:20'],
            'sexo'=>['required', 'string', 'max:20'],
        ]);

        // Crea el usuario principal

        $donante = Donante::create([
            'nombre' => $validated['nombre'],
            'celular' => $validated['celular'],
            'sexo'=>$validated['sexo'],
        ]);
        return redirect()->route('IndexDonante')->with('success', 'Donante registrado correctamente.');
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
        $donante = Donante::findOrFail($id);
        return view('Donante.edit_donante', compact('donante'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'nombre' => ['required', 'string', 'max:255'],
            'celular' => ['required', 'string', 'max:20'],
            'sexo'=>['required', 'string', 'max:20'],
        ]);
        $donante = Donante::findOrFail($id);

          $donante ->update([
            'nombre' => $validated['nombre'],
            'celular' => $validated['celular'],
            'sexo'=>$validated['sexo'],
        ]);
        return redirect()->route('IndexDonante')->with('success', 'Donante actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $doanate = Donante::findOrFail($id);
        $doanate->delete();
        return redirect()->route('IndexDonante')->with('success', 'Donante Elimininado correctamente.');
    }
}
