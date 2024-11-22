<x-app-layout>
    <div class="py-8">
        <div class="bg-white p-6 rounded-lg shadow-lg max-w-3xl mx-auto">
            <h1 class="text-lg font-bold mb-4">Detalles del Evento</h1>

            <div class="mb-4">
                <x-label value="Título:" />
                <p class="text-gray-700">{{ $evento->titulo }}</p>
            </div>

            <div class="mb-4">
                <x-label value="Descripción:" />
                <p class="text-gray-700">{{ $evento->descripcion ?? 'Sin descripción' }}</p>
            </div>

            <div class="mb-4">
                <x-label value="Fecha:" />
                <p class="text-gray-700">{{ \Carbon\Carbon::parse($evento->fecha)->format('d/m/Y') }}</p>
            </div>

            <div class="mb-4">
                <x-label value="Hora de Inicio:" />
                <p class="text-gray-700">{{ $evento->hora_inicio }}</p>
            </div>

            <div class="mb-4">
                <x-label value="Hora de Finalización:" />
                <p class="text-gray-700">{{ $evento->hora_fin ?? 'No especificada' }}</p>
            </div>

            <div class="mb-4">
                <x-label value="Tipo de Evento:" />
                <p class="text-gray-700">{{ $evento->tipoEvento->descripcion }}</p>
            </div>

            <div class="flex justify-end mt-4">
                <a href="{{ route('IndexEvento') }}" class="bg-gray-300 text-gray-700 px-4 py-2 rounded">
                    Volver
                </a>
                <a href="{{ route('EditEvento', $evento->id) }}" class="bg-blue-500 text-white px-4 py-2 ml-2 rounded">
                    Editar
                </a>
                <form action="{{ route('DeleteEvento', ['id' => $evento->id]) }}" method="POST" class="inline-block ml-2">
                    @csrf
                    @method('DELETE')
                    <x-button class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 text-sm uppercase font-bold">
                        Eliminar
                    </x-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
