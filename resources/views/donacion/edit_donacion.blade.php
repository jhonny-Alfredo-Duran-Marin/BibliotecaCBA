<x-app-layout>
    <div class="py-8">
        <div class="bg-white p-6 rounded-lg shadow-lg max-w-3xl mx-auto">
            <h2 class="text-lg font-bold mb-4">Editar Donacion</h2>
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
            <form method="POST" action="{{ route('UpdateDonacion', $donacion->id) }}">
                @csrf
                @method('PUT') <!-- Método PUT para actualizar -->
                <div class="mb-6">
                    <!-- Input -->
                    <div class="w-full mb-4">
                        <div>
                            <x-label for="descripcion" value="{{ __('Descripcion') }}" />
                            <x-input id="descripcion" class="block mt-1 w-full" type="text" name="descripcion" :value="old('descripcion', $donacion->descripcion)" required autofocus autocomplete="descripcion" />
                        </div>
                        <div class="mt-4">
                            <x-label for="fecha" value="{{ __('Fecha') }}" />
                            <x-input id="fecha" class="block mt-1 w-full" type="text" name="fecha" :value="old('fecha', $donacion->fecha)" required autocomplete="fecha" />
                        </div>
                        <div class="mt-4">
                            <x-label for="donante_id" value="donante_id" class="text-sm font-medium text-gray-700 mb-2" />
                            <x-select-input
                            :items="$donante"
                            name="donante_id"
                            :selected="old('donante_id', $donacion->donante_id)"
                            class="block w-full py-2 px-4 text-lg border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md"
                        />
                    </div>
                    <!-- Botón -->
                    <div class="flex justify-end">
                        <x-button
                            class="bg-indigo-500 hover:bg-indigo-600 text-white px-6 py-3 text-sm uppercase font-bold">
                            Actualizar
                        </x-button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
