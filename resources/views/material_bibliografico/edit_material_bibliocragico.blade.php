<x-app-layout>
    <div class="py-8">
        <div class="bg-white p-6 rounded-lg shadow-lg max-w-3xl mx-auto">
            <h2 class="text-lg font-bold mb-4">Editar Material Bibliográfico</h2>

            <!-- Formulario de edición -->
            <form method="POST" action="{{ route('UpdateMaterialBibliografico', $material->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT') <!-- Método PUT para actualizar -->

                <div class="mb-6 space-y-6">

                    <!-- Input: Código -->
                    <div class="w-full">
                        <x-label for="codigo" value="Código" class="text-sm font-medium text-gray-700 mb-2" />
                        <x-input id="codigo"
                                 class="block w-full py-2 text-lg border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md"
                                 type="text"
                                 name="codigo"
                                 :value="old('codigo', $material->codigo)"
                                 required
                                 autofocus
                                 autocomplete="codigo" />
                    </div>

                    <!-- Input: Título -->
                    <div class="w-full">
                        <x-label for="titulo" value="Título" class="text-sm font-medium text-gray-700 mb-2" />
                        <x-input id="titulo"
                                 class="block w-full py-2 text-lg border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md"
                                 type="text"
                                 name="titulo"
                                 :value="old('titulo', $material->titulo)"
                                 required
                                 autofocus
                                 autocomplete="titulo" />
                    </div>

                    <!-- Input: Editorial -->
                    <div class="w-full">
                        <x-label for="editorial" value="Editorial" class="text-sm font-medium text-gray-700 mb-2" />
                        <x-input id="editorial"
                                 class="block w-full py-2 text-lg border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md"
                                 type="text"
                                 name="editorial"
                                 :value="old('editorial', $material->editorial)"
                                 required
                                 autofocus
                                 autocomplete="editorial" />
                    </div>

                    <!-- Input: Autor -->
                    <div class="w-full">
                        <x-label for="autor" value="Autor" class="text-sm font-medium text-gray-700 mb-2" />
                        <x-input id="autor"
                                 class="block w-full py-2 text-lg border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md"
                                 type="text"
                                 name="autor"
                                 :value="old('autor', $material->autor)"
                                 required
                                 autofocus
                                 autocomplete="autor" />
                    </div>

                    <!-- Input: Fecha Publicación -->
                    <div class="w-full">
                        <x-label for="fecha" value="Fecha de Publicación" class="text-sm font-medium text-gray-700 mb-2" />
                        <x-input id="fecha"
                                 class="block w-full py-2 text-lg border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md"
                                 type="date"
                                 name="fecha"
                                 :value="old('fecha', $material->fecha_publicacion)"
                                 required
                                 autofocus
                                 autocomplete="fecha" />
                    </div>

                    <!-- Select: Estado -->
                    <div class="w-full">
                        <x-label for="estado" value="Estado" class="text-sm font-medium text-gray-700 mb-2" />
                        <x-select-input
                            :items="$estado"
                            name="estado"
                            :selected="old('estado', $material->estado_id)"
                            class="block w-full py-2 px-4 text-lg border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md"
                        />
                    </div>

                    <!-- Select: Tipos -->
                    <div class="w-full">
                        <x-label for="tipos" value="Tipo" class="text-sm font-medium text-gray-700 mb-2" />
                        <x-select-input
                            :items="$tipos"
                            name="tipos"
                            :selected="old('tipos', $material->tipo_id)"
                            class="block w-full py-2 px-4 text-lg border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md"
                        />
                    </div>

                    <!-- Select: Categoría -->
                    <div class="w-full">
                        <x-label for="categoria" value="Categoría" class="text-sm font-medium text-gray-700 mb-2" />
                        <x-select-input
                            :items="$categoria"
                            name="categoria"
                            :selected="old('categoria', $material->categoria_id)"
                            class="block w-full py-2 px-4 text-lg border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md"
                        />
                    </div>

                    <!-- Input: Imagen -->
                    <div class="w-full">
                        <x-label for="imagen" value="Imagen" class="text-sm font-medium text-gray-700 mb-2" />
                        <x-input id="imagen"
                                 class="block w-full py-2 text-lg border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md"
                                 type="file"
                                 name="imagen"
                                 accept="image/*"
                                 autocomplete="imagen" />
                        @if($material->imagen) <!-- Mostrar imagen existente si la tiene -->
                            <div class="mt-2">
                                <img src="{{ asset('storage/'.$material->imagen) }}" alt="Imagen actual" class="w-32 h-32 object-cover rounded-md">
                            </div>
                        @endif
                    </div>

                    <!-- Botón de Guardar -->
                    <div class="flex justify-end">
                        <x-button class="bg-indigo-500 hover:bg-indigo-600 text-white px-6 py-3 text-sm uppercase font-bold">
                            Actualizar
                        </x-button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
