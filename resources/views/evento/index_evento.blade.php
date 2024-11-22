<x-app-layout>
    <div class="py-8">
        <div class="bg-white p-6 rounded-lg shadow-lg max-w-3xl mx-auto">

            <!-- Mensaje de éxito o error -->
            @if(session('success'))
                <div class="mb-4 p-4 bg-green-100 text-green-700 border border-green-400 rounded">
                    {{ session('success') }}
                </div>
            @elseif(session('error'))
                <div class="mb-4 p-4 bg-red-100 text-red-700 border border-red-400 rounded">
                    {{ session('error') }}
                </div>
            @endif

            <h1 class="text-lg font-bold mb-4">Eventos</h1>
            <div class="mb-4">
                <a href="{{ route('CrearEvento') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Crear Evento</a>
            </div>
            <table class="table-auto w-full">
                <thead>
                    <tr>
                        <th class="px-4 py-2">Título</th>
                        <th class="px-4 py-2">Fecha</th>
                        <th class="px-4 py-2">Hora de Inicio</th>
                        <th class="px-4 py-2">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($evento as $event)
                        <tr>
                            <td class="px-4 py-2">{{ $event->titulo }}</td>
                            <td class="px-4 py-2">{{ $event->fecha }}</td>
                            <td class="px-4 py-2">{{ $event->hora_inicio }}</td>
                            <td class="px-4 py-2">
                                <a href="{{ route('EditEvento', $event->id) }}" class="text-blue-500">Editar</a>
                                <form action="{{ route('DeleteEvento', $event->id) }}" method="POST" class="inline-block ml-2">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
