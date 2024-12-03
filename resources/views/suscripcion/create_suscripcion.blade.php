<x-app-layout>
    <div class="py-8">
        <div class="bg-white p-6 rounded-lg shadow-lg max-w-3xl mx-auto">
            <h2 class="text-lg font-bold mb-4">Crear Suscripcion</h2>
            <form method="POST" action="{{ route('GuardarSuscripcion') }}">
                @csrf
                <div class="mb-6">
                    <!-- Input -->
                    <div class="w-full mb-4">
                        <x-label for="descripcion" value="Descripción" />
                        <x-input id="descripcion"
                                 class="block w-full py-2 text-lg border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md"
                                 type="text"
                                 name="descripcion"
                                 :value="old('descripcion')"
                                 required
                                 autofocus
                                 autocomplete="descripcion" />
                    </div>
                    <div class="w-full mb-4">
                        <x-label for="duracion" value="Duracion" />
                        <x-input id="duracion"
                                 class="block w-full py-2 text-lg border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md"
                                type="number"
                                 name="duracion"
                                 :value="old('duracion')"
                                 required
                                 autofocus
                                 autocomplete="duracion" />
                    </div>
                    <div class="w-full mb-4">
                        <x-label for="costo" value="Costo" />
                        <x-input id="costo"
                                 class="block w-full py-2 text-lg border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md"
                                 type="number"
                                 name="costo"
                                 :value="old('costo')"
                                 required
                                 autofocus
                                 autocomplete="costo" />
                    </div>
                    <!-- Botón -->
                    <div class="flex justify-end">
                        <x-button class="bg-indigo-500 hover:bg-indigo-600 text-white px-6 py-3 text-sm uppercase font-bold">
                            Guardar
                        </x-button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>

