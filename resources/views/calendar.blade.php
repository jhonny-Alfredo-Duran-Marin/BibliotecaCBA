@extends('layouts.app')

@section('content')
<div id="calendar"></div>

<!-- Modal para seleccionar el tipo de evento -->
<div class="modal fade" id="tipoEventoModal" tabindex="-1" aria-labelledby="tipoEventoModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tipoEventoModalLabel">Seleccione el tipo de evento</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <select id="tipoEventoSelect" class="form-select">
                    <option value="">Seleccione el tipo de evento</option>
                    <!-- Los tipos de evento se llenarán dinámicamente aquí -->
                </select>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" id="guardarTipoEvento">Guardar</button>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/@fullcalendar/core@5.10.0/main.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@fullcalendar/daygrid@5.10.0/main.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@fullcalendar/interaction@5.10.0/main.min.js"></script>
    <script src="{{ asset('js/calendar.js') }}"></script>  <!-- Tu archivo JS donde está el código del calendario -->
@endsection
