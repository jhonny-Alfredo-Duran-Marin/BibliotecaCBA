<x-app-layout>
    <div class="py-8">
        <div class="bg-white p-6 rounded-lg shadow-lg max-w-3xl mx-auto">
            <h2 class="text-lg font-bold mb-4">Editar Evento</h2>
 <!-- Mostrar errores generales -->
 @if ($errors->any())
 <div class="mb-4 p-4 bg-red-100 border border-red-300 text-red-600 rounded">
     <strong>¡No se pudo crear el evento!</strong>
     <ul>
         @foreach ($errors->all() as $error)
             <li>{{ $error }}</li>
         @endforeach
     </ul>
 </div>
@endif
            <form method="POST" action="{{ route('UpdateEvento', $event->id) }}">
                @csrf
                @method('PUT')

                <div class="mb-6">
                    <label for="titulo" class="block text-gray-700">Título</label>
                    <input type="text" name="titulo" id="titulo" value="{{ old('titulo', $event->titulo) }}" class="w-full py-2 text-lg border-gray-300 rounded-md" required>
                </div>

                <div class="mb-6">
                    <label for="descripcion" class="block text-gray-700">Descripción</label>
                    <textarea name="descripcion" id="descripcion" class="w-full py-2 text-lg border-gray-300 rounded-md" required>{{ old('descripcion', $event->descripcion) }}</textarea>
                </div>

                <div class="mb-6">
                    <label for="fecha" class="block text-gray-700">Fecha</label>
                    <input type="date" name="fecha" id="fecha" value="{{ old('fecha', $event->fecha) }}" class="w-full py-2 text-lg border-gray-300 rounded-md" required>
                </div>

                <div class="mb-6">
                    <label for="hora_inicio" class="block text-gray-700">Hora de Inicio</label>
                    <input type="time" name="hora_inicio" id="hora_inicio" value="{{ old('hora_inicio', $event->hora_inicio) }}" class="w-full py-2 text-lg border-gray-300 rounded-md" required>
                </div>

                <div class="mb-6">
                    <label for="hora_fin" class="block text-gray-700">Hora de Fin</label>
                    <input type="time" name="hora_fin" id="hora_fin" value="{{ old('hora_fin', $event->hora_fin) }}" class="w-full py-2 text-lg border-gray-300 rounded-md">
                </div>
                <div class="w-full">
                    <x-label for="tipoevento" value="Tipo Evento" class="text-sm font-medium text-gray-700 mb-2" />
                    <x-select-input
                    :items="$tipoevento"
                    name="tipo_evento_id"  
                    :selected="old('tipo_evento_id', $event->tipo_evento_id)"
                    class="block w-full py-2 px-4 text-lg border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md"
                />
                </div>
                <div class="flex justify-end">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-md">Actualizar Evento</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
