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

            <h2 class="text-lg font-bold mb-4">Donaciones</h2>

            <table class="min-w-full table-auto">
                <thead>
                    <tr>
                        <th class="px-4 py-2 text-left">Descripción</th>
                        <th class="px-4 py-2 text-left">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($donacion as $tipo)
                        <tr>
                            <td class="px-4 py-2">{{ $tipo->descripcion }}</td>
                            <td class="px-4 py-2">
                                <!-- Contenedor de botones -->
                                <div class="flex space-x-2">
                                    <!-- Botón de Editar -->
                                    <a href="{{ route('EditDonacion', ['id' => $tipo->id]) }}"
                                       class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 text-sm uppercase font-bold rounded">
                                        Editar
                                    </a>
                                    <!-- Botón de Ver -->
                                    <a href="{{ route('ShowDonacion', ['id' => $tipo->id]) }}"
                                       class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 text-sm uppercase font-bold rounded">
                                        Ver
                                    </a>
                                    <!-- Botón de Eliminar -->
                                    <form action="{{ route('DeleteDonacion', ['id' => $tipo->id]) }}" method="POST" class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <x-button class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 text-sm uppercase font-bold">
                                            Eliminar
                                        </x-button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Paginación -->
            <div class="mt-4">
                {{ $donacion->links() }}
            </div>

            <div class="mt-4">
                <a href="{{ route('CrearDonacion') }}" class="text-indigo-500 hover:underline">Crear nueva Donación</a>
            </div>
        </div>
    </div>
</x-app-layout>
