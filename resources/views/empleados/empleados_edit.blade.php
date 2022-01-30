<form action="{{route('empleados.update')}}" method="POST" autocomplete="off">
    {{csrf_field()}}
    <input type="hidden" name="id" value="{{$empleado->id}}"/>
    <div class="modal-header">
        <h5 class="modal-title" id="example-Modal3">Editar Empleado</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <div class="row">
            <div class="col-md-4">
                <label class="form-control-label">Sucursal:</label>
                <select name="sucursal_id" class="form-control">
                    {{\App\Library\Combo::render($sucursales,$empleado->sucursal_id,'id','su_nombre',false)}}
                </select>
            </div>
            <div class="col-md-4">
                <label class="form-control-label">Nombre:</label>
                <input type="text" name="em_nombre" value="{{$empleado->em_nombre}}" class="form-control">
            </div>
            <div class="col-md-4">
                <label class="form-control-label">Teléfono:</label>
                <input type="text" name="em_telefono" value="{{$empleado->em_telefono}}" class="form-control">
            </div>
            <div class="col-md-4">
                <br>
                <label class="form-control-label">Cargo:</label>
                <input type="text" name="em_cargo" value="{{$empleado->em_cargo}}" class="form-control">
            </div>
            <div class="col-md-4">
                <br>
                <label class="form-control-label">NSS:</label>
                <input type="text" name="em_nss" value="{{$empleado->em_nss}}" class="form-control">
            </div>
            <div class="col-md-4">
                <br>
                <label class="form-control-label">CURP:</label>
                <input type="text" name="em_curp" value="{{$empleado->em_curp}}" class="form-control">
            </div>
            <div class="col-md-4">
                <br>
                <label class="form-control-label">Fecha de Nacimiento:</label>
                <input type="text" name="em_fecha_nacimiento" value="{{$empleado->em_fecha_nacimiento}}" class="form-control fc-datepicker">
            </div>
            <div class="col-md-4">
                <br>
                <label class="form-control-label">Fecha de Antigüedad:</label>
                <input type="text" name="em_fecha_antiguedad" value="{{$empleado->em_fecha_antiguedad}}" class="form-control fc-datepicker">
            </div>
            
            <div class="col-md-12">
                <div class="form-group">
                    <div class="form-label">Acta de Nacimiento</div>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="example-file-input-custom">
                        <label class="custom-file-label">Selecciona Archivo</label>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group">
                    <div class="form-label">INE</div>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="example-file-input-custom">
                        <label class="custom-file-label">Selecciona Archivo</label>
                    </div>
                </div>
            </div> 

            <div class="col-md-12">
                <div class="form-group">
                    <div class="form-label">CURP</div>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="example-file-input-custom">
                        <label class="custom-file-label">Selecciona Archivo</label>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group">
                    <div class="form-label">Comprobante de Domicilio</div>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="example-file-input-custom">
                        <label class="custom-file-label">Selecciona Archivo</label>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group">
                    <div class="form-label">Contrato</div>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="example-file-input-custom">
                        <label class="custom-file-label">Selecciona Archivo</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Actualizar Empleado</button>
    </div>
</form>

<script>
// Datepicker
$('.fc-datepicker').datepicker({
    showOtherMonths: true,
    selectOtherMonths: true
});
</script>