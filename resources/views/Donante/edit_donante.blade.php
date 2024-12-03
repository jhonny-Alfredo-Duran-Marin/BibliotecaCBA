<x-app-layout>
    <div class="py-8">
        <div class="bg-white p-6 rounded-lg shadow-lg max-w-3xl mx-auto">
            <h2 class="text-lg font-bold mb-4">Editar Donante</h2>
            <form method="POST" action="{{ route('UpdateDonante', $donante->id) }}">
                @csrf
                @method('PUT') <!-- Método PUT para actualizar -->
                <div class="mb-6">
                    <!-- Input -->
                    <div class="w-full mb-4">
                        <div>
                            <x-label for="nombre" value="{{ __('Nombre') }}" />
                            <x-input id="nombre" class="block mt-1 w-full" type="text" name="nombre" :value="old('nombre', $donante->Nombre)" required autofocus autocomplete="nombre" />
                        </div>
                        <div class="mt-4">
                            <x-label for="sexo" value="{{ __('Sexo') }}" />
                            <x-select-sexo name="sexo" :selected="old('sexo', $donante->Sexo)" />
                        </div>
                        <div class="mt-4">
                            <x-label for="celular" value="{{ __('Celular') }}" />
                            <x-input id="celular" class="block mt-1 w-full" type="text" name="celular" :value="old('celular', $donante->celular)" required autocomplete="celular" />
                        </div>
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
