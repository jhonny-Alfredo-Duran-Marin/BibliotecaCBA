<x-app-layout>
    <div class="py-8">
        <div class="bg-white p-6 rounded-lg shadow-lg max-w-3xl mx-auto">
            <h1 class="text-lg font-bold mb-4">Editar Evento</h1>

            <!-- Mostrar errores generales -->
            @if ($errors->any())
                <div class="mb-4 p-4 bg-red-100 border border-red-300 text-red-600 rounded">
                    <strong>¡No se pudo editar el evento!</strong>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('UpdateEvento', $evento->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <x-label for="titulo" value="Título" />
                    <x-input type="text" name="titulo" id="titulo" class="w-full border rounded" value="{{ old('titulo', $evento->titulo) }}" required />
                </div>

                <div class="mb-4">
                    <x-label for="fecha" value="Fecha" />
                    <x-input type="date" name="fecha" id="fecha" class="w-full border rounded" value="{{ old('fecha', $evento->fecha) }}" required />
                </div>

               <!-- Hora de inicio -->
<div class="mb-4">
    <x-label for="hora_inicio" value="Hora de Inicio" />
    <x-input type="time" name="hora_inicio" id="hora_inicio" class="w-full border rounded" value="{{ old('hora_inicio', $evento->hora_inicio) }}" required />
</div>

<!-- Hora de finalización -->
<div class="mb-4">
    <x-label for="hora_fin" value="Hora de Finalización" />
    <x-input type="time" name="hora_fin" id="hora_fin" class="w-full border rounded" value="{{ old('hora_fin', $evento->hora_fin) }}" />
</div>

                <div class="mb-4">
                    <x-label for="descripcion" value="Descripción" />
                    <textarea name="descripcion" id="descripcion" class="w-full border rounded">{{ old('descripcion', $evento->descripcion) }}</textarea>
                </div>

                <!-- Select: Tipo Evento -->
                <div class="w-full">
                    <x-label for="tipoevento" value="Tipo Evento" class="text-sm font-medium text-gray-700 mb-2" />
                    <x-select-input
                        :items="$tipoevento"
                        name="tipo_evento_id"
                        :selected="old('tipo_evento_id', $evento->tipo_evento_id)"
                        class="block w-full py-2 px-4 text-lg border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md"
                    />
                </div>

                <div class="flex justify-end mt-4">
                    <x-button class="bg-blue-500 text-white px-4 py-2 rounded">
                        Actualizar
                    </x-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
