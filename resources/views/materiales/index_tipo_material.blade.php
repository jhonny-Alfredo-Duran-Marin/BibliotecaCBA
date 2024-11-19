<x-app-layout>
    <div class="py-8">
        <div class="bg-white p-6 rounded-lg shadow-lg max-w-3xl mx-auto">
            <h2 class="text-lg font-bold mb-4">Tipos de Materiales</h2>

            <table class="min-w-full table-auto">
                <thead>
                    <tr>
                        <th class="px-4 py-2 text-left">Descripción</th>
                        <th class="px-4 py-2 text-left">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tiposMateriales as $tipo)
                        <tr>
                            <td class="px-4 py-2">{{ $tipo->descripcion }}</td>
                            <td class="px-4 py-2">
                                <a href="" class="text-blue-500 hover:underline">Editar</a>
                                <form action="" method="POST" class="inline-block ml-2">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:underline">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="mt-4">
                <a href="{{ route('CrearTipoMaterial') }}" class="text-indigo-500 hover:underline">Crear nuevo tipo de material</a>
            </div>
        </div>
    </div>
</x-app-layout>
