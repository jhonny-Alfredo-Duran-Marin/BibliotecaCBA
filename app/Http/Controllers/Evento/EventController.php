<?php

namespace App\Http\Controllers\Evento;

use App\Http\Controllers\Controller;
use App\Models\Evento\Evento;
use App\Models\TipoEvento\TipoEvento;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $evento = Evento::all();
        return view('evento.index_evento', compact('evento'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tipoevento = TipoEvento::pluck('descripcion', 'id')->toArray();
        return view('evento.create_evento', compact('tipoevento'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'titulo' => 'required|string|max:255', // El título es obligatorio y debe ser una cadena de texto, con un máximo de 255 caracteres
            'descripcion' => 'nullable|string|max:1000', // La descripción es opcional y debe ser una cadena de texto, con un máximo de 1000 caracteres
            'fecha' => 'required|date|after_or_equal:today', // La fecha es obligatoria y debe ser una fecha válida, no puede ser antes de hoy
            'hora_inicio' => 'required|date_format:H:i', // La hora de inicio es obligatoria y debe tener el formato HH:MM (24 horas)
            'hora_fin' => 'nullable|date_format:H:i|after:hora_inicio', // La hora de fin es opcional y debe tener el formato HH:MM (24 horas), debe ser después de la hora de inicio si se proporciona
            'tipo_evento_id' => 'required|exists:tipo_eventos,id', // El tipo de evento es obligatorio y debe existir en la tabla tipo_eventos
        ]);
        // Crear el evento
        $evento = new Evento();
        $evento->titulo = $request->titulo;
        $evento->descripcion = $request->descripcion;
        $evento->fecha = $request->fecha;
        $evento->hora_inicio = $request->hora_inicio;
        $evento->hora_fin = $request->hora_fin;
        $evento->tipo_evento_id = $request->tipo_evento_id; // Asignar el valor de tipo_evento_id
        $evento->save();

        return redirect()->route('IndexEvento')->with('success', 'Evento creado correctamente');
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
        $evento = Evento::findOrFail($id);
        $tipoevento = TipoEvento::pluck('descripcion', 'id')->toArray();
        return view('evento.edit_evento', compact('evento','tipoevento'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'fecha' => 'required|date',
            'hora_inicio' => 'required',
            'hora_fin' => 'nullable|after:hora_inicio', // Corregir validación para hora_fin
            'descripcion' => 'nullable|string',
            'tipo_evento_id' => 'required|exists:tipo_eventos,id',
        ]);
        $evento = Evento::findOrFail($id);
        $evento->update($request->all());
        return redirect()->route('IndexEvento')->with('success', 'Evento actualizado con éxito.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $evento = Evento::findOrFail($id);
        $evento->delete();
        return redirect()->route('IndexEvento')->with('success', 'Evento eliminado con éxito.');
    }
}
