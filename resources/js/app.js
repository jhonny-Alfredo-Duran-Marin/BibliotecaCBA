import './bootstrap';
import { Calendar } from '@fullcalendar/core';
import dayGridPlugin from '@fullcalendar/daygrid';
import interactionPlugin from '@fullcalendar/interaction'; // Para interactuar con el calendario

document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    var calendar = new Calendar(calendarEl, {
        plugins: [dayGridPlugin, interactionPlugin],
        initialView: 'dayGridMonth',
        events: '/get-events',  // Ruta que obtiene los eventos desde tu controlador

        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'customButton dayGridMonth',
        },

        customButtons: {
            customButton: {
                text: 'Registrar nuevo evento',
                click: function() {
                    // Redirigir al formulario de creación de un nuevo evento
                    window.location.href = '/crearevento';
                },
            },
        },

        eventClick: function(info) {
            // Obtener el ID del evento
            var eventId = info.event.id;

            // Redirigir a la vista de detalles del evento
            window.location.href = `/evento/${eventId}`;
        },
    });

    calendar.render();
});
