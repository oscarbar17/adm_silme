<form action="{{route('empleados.store')}}" method="POST" autocomplete="off">
    {{csrf_field()}}
    <div class="modal-header">
        <h5 class="modal-title" id="example-Modal3">Nuevo Empleado</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <div class="form-group">
            <label for="recipient-name" class="form-control-label">Sucursal:</label>
            <select name="sucursal_id" class="form-control">
                {{\App\Library\Combo::render($sucursales,'','id','su_nombre',false)}}
            </select>
        </div>
        <div class="form-group">
            <label for="message-text" class="form-control-label">Nombre:</label>
            <input type="text" name="em_nombre" class="form-control">
        </div>
        <div class="form-group">
            <label for="message-text" class="form-control-label">Teléfono:</label>
            <input type="text" name="em_telefono" class="form-control">
        </div>
        <div class="form-group">
            <label for="message-text" class="form-control-label">Cargo:</label>
            <input type="text" name="em_cargo" class="form-control">
        </div>
        <div class="form-group">
            <label for="message-text" class="form-control-label">NSS:</label>
            <input type="text" name="em_nss" class="form-control">
        </div>
        <div class="form-group">
            <label for="message-text" class="form-control-label">CURP:</label>
            <input type="text" name="em_curp" class="form-control">
        </div>
        <div class="form-group">
            <label for="message-text" class="form-control-label">Fecha de Nacimiento:</label>
            <input type="text" name="em_fecha_nacimiento" class="form-control fc-datepicker">
        </div>
        <div class="form-group">
            <label for="message-text" class="form-control-label">Fecha de Antigüedad:</label>
            <input type="text" name="em_fecha_antiguedad" class="form-control fc-datepicker">
        </div>
    
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Guardar Empleado</button>
    </div>
</form>

<script>
// Datepicker
$('.fc-datepicker').datepicker({
    showOtherMonths: true,
    selectOtherMonths: true
});
</script>