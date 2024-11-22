<x-app-layout>
    <div class="py-8">
        <div class="bg-white p-6 rounded-lg shadow-lg max-w-3xl mx-auto">
            <h2 class="text-lg font-bold mb-4">Calendario de Eventos</h2>

            <!-- FullCalendar -->
            <div id="calendar"></div>

        </div>
    </div>

    @push('scripts')
        <script>
            $(document).ready(function() {
                $('#calendar').fullCalendar({
                    events: '{{ route('IndexEvento') }}',
                    editable: true,
                    droppable: true,
                    eventClick: function(event) {
                        if (confirm('¿Quieres eliminar este evento?')) {
                            fetch('/eliminaraevento/' + event.id, {
                                    method: 'DELETE',
                                    headers: {
                                        'Content-Type': 'application/json',
                                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                    }
                                })
                                .then(response => {
                                    $('#calendar').fullCalendar('removeEvents', event.id);
                                });
                        }
                    },
                    dateClick: function(info) {
                        var title = prompt('Ingrese el título del evento:');
                        if (title) {
                            var description = prompt('Descripción del evento:');
                            var eventDate = info.dateStr;

                            fetch('{{ route('GuardarEvento') }}', {
                                    method: 'POST',
                                    headers: {
                                        'Content-Type': 'application/json',
                                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                    },
                                    body: JSON.stringify({
                                        titulo: title,
                                        descripcion: description,
                                        fecha: eventDate,
                                    })
                                })
                                .then(response => response.json())
                                .then(data => {
                                    $('#calendar').fullCalendar('renderEvent', {
                                        id: data.id,
                                        title: data.titulo,
                                        start: data.fecha + 'T' + data.hora_inicio,
                                        end: data.hora_fin ? data.fecha + 'T' + data.hora_fin :
                                            data.fecha + 'T' + data.hora_inicio,
                                        description: data.descripcion,
                                    });
                                });
                        }
                    }
                });
            });
        </script>
    @endpush
</x-app-layout>
