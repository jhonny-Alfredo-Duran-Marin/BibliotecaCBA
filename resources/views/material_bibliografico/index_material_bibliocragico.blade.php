<x-app-layout>
    <div class="py-8">
        <div class="bg-white p-6 rounded-lg shadow-lg max-w-3xl mx-auto">

            <!-- Mensaje de éxito o error -->
            @if(session('success'))
                <div class="mb-4 p-4 bg-green-100 text-green-700 border border-green-400 rounded">
                    {{ session('success') }}
                </div>
            @elseif(session('error'))
                <div class="mb-4 p-4 bg-red-100 text-red-700 border border-red-400 rounded">
                    {{ session('error') }}
                </div>
            @endif

            <h2 class="text-lg font-bold mb-4">Material Bibliografico</h2>

            <table class="min-w-full table-auto">
                <thead>
                    <tr>
                        <th class="px-4 py-2 text-left">Codigo</th>
                        <th class="px-4 py-2 text-left">Titulo</th>
                        <th class="px-4 py-2 text-left">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($materiales as $m)
                        <tr>
                            <td class="px-4 py-2">{{ $m->codigo }}</td>
                            <td class="px-4 py-2">{{ $m->titulo }}</td>
                            <td class="px-4 py-2">
                                <!-- Botón de Ver -->
                                <a href="{{ route('ShowMaterialBibliografico', ['id' => $m->id]) }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 text-sm uppercase font-bold rounded mr-2">
                                    Ver
                                </a>

                                <!-- Botón de Editar -->
                                <a href="{{ route('EditMaterialBibliografico', ['id' => $m->id]) }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 text-sm uppercase font-bold rounded mr-2">
                                    Editar
                                </a>

                                <!-- Botón de Eliminar -->
                                <form action="{{ route('DeleteMaterialBibliografico', ['id' => $m->id]) }}" method="POST" class="inline-block ml-2">
                                    @csrf
                                    @method('DELETE')
                                    <x-button class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 text-sm uppercase font-bold">
                                        Eliminar
                                    </x-button>
                                </form>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Paginación -->
            <div class="mt-4">
                {{ $materiales->links() }}
            </div>

            <div class="mt-4">
                <a href="{{ route('CrearMaterialBibliografico') }}" class="text-indigo-500 hover:underline">Crear nuevo material bibliografico</a>
            </div>
        </div>
    </div>
</x-app-layout>
