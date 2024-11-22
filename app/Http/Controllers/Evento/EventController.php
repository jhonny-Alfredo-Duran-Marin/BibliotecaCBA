<?php

namespace App\Http\Controllers\Evento;

use App\Http\Controllers\Controller;
use App\Models\Evento\Evento;
use App\Models\TipoEvento\TipoEvento;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Obtener todos los eventos para FullCalendar.
     */
    // En tu controlador (EventController)
    public function getEvents()
    {
        $events = Evento::all(['id', 'titulo', 'descripcion', 'fecha', 'hora_inicio', 'hora_fin']);

        return response()->json($events->map(function ($event) {
            return [
                'id' => $event->id,
                'title' => $event->titulo,
                'start' => $event->fecha . 'T' . $event->hora_inicio,
                'end' => $event->hora_fin ? $event->fecha . 'T' . $event->hora_fin : $event->fecha . 'T' . $event->hora_inicio,
                'description' => $event->descripcion,
            ];
        }));
    }



    /**
     * Mostrar la lista de eventos.
     */
    public function index()
    {
        // Pasar los eventos a la vista si es necesario
        return view('evento.index_evento');
    }

    /**
     * Mostrar el formulario para crear un nuevo evento.
     */
    public function create()
    {
        $tipoevento = TipoEvento::pluck('descripcion', 'id')->toArray();
        return view('evento.create_evento', compact('tipoevento'));  // Pasando 'date' a la vista
    }


    /**
     * Guardar un nuevo evento en la base de datos.
     */
    public function store(Request $request)
    {
        // Validación de los datos
        $validated = $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'nullable|string|max:1000',
            'fecha' => 'required|date',
            'hora_inicio' => 'required|date_format:H:i',
            'hora_fin' => 'nullable|date_format:H:i|after:hora_inicio',
            'tipo_evento_id' => 'required|exists:tipo_eventos,id',
        ]);

        try {
            // Crear el evento
            $event = Evento::create([
                'titulo' => $validated['titulo'],
                'descripcion' => $validated['descripcion'],
                'fecha' => $validated['fecha'],
                'hora_inicio' => $validated['hora_inicio'],
                'hora_fin' => $validated['hora_fin'],
                'tipo_evento_id' => $validated['tipo_evento_id'],
            ]);

            // Retornar el evento creado
              return redirect()->route('IndexEvento')->with('success', 'Evento Creado con éxito.');
        } catch (\Exception $e) {
            // Si hay algún error, retornar un mensaje de error con el código 500
            return response()->json(['error' => 'Error al guardar el evento', 'message' => $e->getMessage()], 500);
        }
    }

    public function show($id)
    {
        $evento = Evento::with('tipoEvento')->findOrFail($id);

        return view('evento.show_evento', compact('evento'));
    }

    /**
     * Mostrar el formulario para editar un evento.
     */
    public function edit(string $id)
    {
        // Obtener el evento y los tipos de eventos para el formulario de edición
        $event = Evento::findOrFail($id);
        $tipoevento = TipoEvento::pluck('descripcion', 'id')->toArray();
        return view('evento.edit_evento', compact('event', 'tipoevento'));
    }

    /**
     * Actualizar un evento en la base de datos.
     */
    public function update(Request $request, string $id)
    {
        // Validar los datos del evento
        $validated = $request->validate([
            'titulo' => 'required|string|max:255',
            'fecha' => 'required|date',
            'hora_inicio' => 'required',
            'hora_fin' => 'nullable|after:hora_inicio',
            'descripcion' => 'nullable|string',
            'tipo_evento_id' => 'required|exists:tipo_eventos,id',
        ]);

        // Obtener el evento y actualizar sus datos
        $evento = Evento::findOrFail($id);
        $evento->update($request->all());

        // Redirigir con mensaje de éxito
        return redirect()->route('IndexEvento')->with('success', 'Evento actualizado con éxito.');
    }

    /**
     * Eliminar un evento de la base de datos.
     */
    public function destroy(string $id)
    {
        $evento = Evento::findOrFail($id);
        $evento->delete();

        return redirect()->route('IndexEvento')->with('success', 'Evento Eliminado con éxito.');
    }
}
