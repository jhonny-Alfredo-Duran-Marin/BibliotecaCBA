<x-app-layout>
    <div class="py-8">
        <div class="bg-white p-6 rounded-lg shadow-lg max-w-3xl mx-auto">
            <h2 class="text-lg font-bold mb-4">Detalles del Material Bibliográfico</h2>

            <!-- Información del Material -->
            <div class="space-y-4">
                <!-- Título -->
                <div>
                    <x-label for="titulo" value="Título" class="text-sm font-medium text-gray-700" />
                    <p class="text-lg text-gray-800">{{ $material->titulo }}</p>
                </div>

                <!-- Autor -->
                <div>
                    <x-label for="autor" value="Autor" class="text-sm font-medium text-gray-700" />
                    <p class="text-lg text-gray-800">{{ $material->autor }}</p>
                </div>

                <!-- Editorial -->
                <div>
                    <x-label for="editorial" value="Editorial" class="text-sm font-medium text-gray-700" />
                    <p class="text-lg text-gray-800">{{ $material->editorial }}</p>
                </div>

                <!-- Fecha de Publicación -->
                <div>
                    <x-label for="fecha" value="Fecha de Publicación" class="text-sm font-medium text-gray-700" />
                    <p class="text-lg text-gray-800">{{ \Carbon\Carbon::parse($material->fecha_publicacion)->format('d/m/Y') }}</p>
                </div>

                <!-- Imagen (si existe) -->
                @if($material->imagen)
                    <div>
                        <x-label for="imagen" value="Imagen" class="text-sm font-medium text-gray-700" />
                        <img src="{{ asset('storage/'.$material->imagen) }}" alt="Imagen del Material" class="w-full h-auto rounded-md">
                    </div>
                @else
                    <div>
                        <x-label for="imagen" value="Imagen" class="text-sm font-medium text-gray-700" />
                        <p class="text-lg text-gray-800">No se ha cargado imagen para este material.</p>
                    </div>
                @endif

                <!-- Estado -->
                <div>
                    <x-label for="estado" value="Estado" class="text-sm font-medium text-gray-700" />
                    <p class="text-lg text-gray-800">{{ $material->estado->descripcion }}</p>
                </div>

                <!-- Tipo -->
                <div>
                    <x-label for="tipo" value="Tipo" class="text-sm font-medium text-gray-700" />
                    <p class="text-lg text-gray-800">{{ $material->tipo->descripcion }}</p>
                </div>

                <!-- Categoría -->
                <div>
                    <x-label for="categoria" value="Categoría" class="text-sm font-medium text-gray-700" />
                    <p class="text-lg text-gray-800">{{ $material->categoria->descripcion }}</p>
                </div>
            </div>

            <!-- Botón de Volver -->
            <div class="flex justify-end mt-6">
                <a href="{{ route('indexMaterialBibliografico') }}" class="bg-indigo-500 hover:bg-indigo-600 text-white px-6 py-3 text-sm uppercase font-bold rounded-md">
                    Volver a la Lista
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
