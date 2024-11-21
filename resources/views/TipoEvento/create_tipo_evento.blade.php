<x-app-layout>
    <div class="py-8">
        <div class="bg-white p-6 rounded-lg shadow-lg max-w-3xl mx-auto">
            <h2 class="text-lg font-bold mb-4">Crear Tipo de Material</h2>
            <form method="POST" action="{{ route('GuardarTipoEvento') }}">
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

