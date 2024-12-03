<x-app-layout>
    <div class="py-8">
        <div class="bg-white p-6 rounded-lg shadow-lg max-w-3xl mx-auto">
            <h2 class="text-lg font-bold mb-4">Detalles de la Donación</h2>
            <div class="mb-6">
                <!-- Detalles -->
                <div class="w-full mb-4">
                    <div class="mb-4">
                        <x-label value="Descripcion" class="text-sm font-medium text-gray-700 mb-2" />
                        <p class="text-gray-800 text-lg">{{ $donacion->descripcion }}</p>
                    </div>
                    <div class="mb-4">
                        <x-label value="Fecha" class="text-sm font-medium text-gray-700 mb-2" />
                        <p class="text-gray-800 text-lg">{{ $donacion->fecha }}</p>
                    </div>
                    <div class="mb-4">
                        <x-label value="Donante" class="text-sm font-medium text-gray-700 mb-2" />
                        <p class="text-gray-800 text-lg">{{ $donacion->donante->Nombre }}</p>
                    </div>
                </div>
                <!-- Botones de acción -->
                <div class="flex justify-end space-x-4">
                    <a href="{{ route('IndexDonacion') }}"
                       class="bg-indigo-500 hover:bg-indigo-600 text-white px-6 py-3 text-sm uppercase font-bold rounded">
                        Volver
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
