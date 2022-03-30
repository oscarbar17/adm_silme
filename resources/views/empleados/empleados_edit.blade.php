<form action="{{route('empleados.update')}}" method="POST" autocomplete="off" id="frmEditEmpleado">
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
                <label class="form-control-label">Rol:</label>
                <select name="rol_id" class="form-control">
                    {{\App\Library\Combo::render($roles,$usuario->rol_id,'id','ro_descripcion',false)}}
                </select>
            </div>
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
                <label class="form-control-label">Apellido Paterno:</label>
                <input type="text" name="em_apellido_paterno" value="{{$empleado->em_apellido_paterno}}" class="form-control">
            </div>
            <div class="col-md-4">
                <br>
                <label class="form-control-label">Apellido Materno:</label>
                <input type="text" name="em_apellido_materno" value="{{$empleado->em_apellido_materno}}" class="form-control">
            </div>
            <div class="col-md-4">
                <br>
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
                <input type="date" name="em_fecha_nacimiento" value="{{$empleado->em_fecha_nacimiento}}" class="form-control fc-datepicker">
            </div>
            <div class="col-md-4">
                <br>
                <label class="form-control-label">Fecha de Antigüedad:</label>
                <input type="date" name="em_fecha_antiguedad" value="{{$empleado->em_fecha_antiguedad}}" class="form-control fc-datepicker">
            </div>
            <div class="col-md-4">
                <br>
                <div class="form-group">
                    <label for="message-text" class="form-control-label">Número de Contacto de Emergencia:</label>
                    <input type="text" name="em_contacto_emergencia" value="{{$empleado->em_contacto_emergencia}}" class="form-control">
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <div class="form-label">Acta de Nacimiento</div>
                    @if($empleado->em_path_acta)
                        <a href="{{route('empleados.download_file',[$empleado->id,'ACTA'])}}" class="btn btn-primary btn-sm">
                            Descargar Archivo
                        </a>
                        <a href="{{route('empleados.destroy_file',[$empleado->id,'ACTA'])}}" class="btn btn-danger btn-sm btn-destroy-file">
                            Eliminar Archivo
                        </a>
                    @else
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="acta_nacimiento_file" accept="image/jpeg,image/gif,image/png,application/pdf,image/x-eps" />
                        <label class="custom-file-label">Selecciona Archivo</label>
                    </div>
                    @endif
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group">
                    <div class="form-label">INE</div>
                    @if($empleado->em_path_ine)
                        <a href="{{route('empleados.download_file',[$empleado->id,'INE'])}}" class="btn btn-primary btn-sm">
                            Descargar Archivo
                        </a>
                        <a href="{{route('empleados.destroy_file',[$empleado->id,'INE'])}}" class="btn btn-danger btn-sm">
                            Eliminar Archivo
                        </a>
                    @else
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="ine_file" accept="image/jpeg,image/gif,image/png,application/pdf,image/x-eps" />
                            <label class="custom-file-label">Selecciona Archivo</label>
                        </div>
                    @endif
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group">
                    <div class="form-label">CURP</div>
                    @if($empleado->em_path_curp)
                        <a href="{{route('empleados.download_file',[$empleado->id,'CURP'])}}" class="btn btn-primary btn-sm">
                            Descargar Archivo
                        </a>
                        <a href="{{route('empleados.destroy_file',[$empleado->id,'CURP'])}}" class="btn btn-danger btn-sm">
                            Eliminar Archivo
                        </a>
                    @else
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="curp_file" accept="image/jpeg,image/gif,image/png,application/pdf,image/x-eps" />
                        <label class="custom-file-label">Selecciona Archivo</label>
                    </div>
                    @endif
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group">
                    <div class="form-label">Comprobante de Domicilio</div>
                    @if($empleado->em_path_comprobante_dom)
                        <a href="{{route('empleados.download_file',[$empleado->id,'COMPROBANTE_DOM'])}}" class="btn btn-primary btn-sm">
                            Descargar Archivo
                        </a>
                        <a href="{{route('empleados.destroy_file',[$empleado->id,'COMPROBANTE_DOM'])}}" class="btn btn-danger btn-sm">
                            Eliminar Archivo
                        </a>
                    @else
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="comprobante_file" accept="image/jpeg,image/gif,image/png,application/pdf,image/x-eps" />
                        <label class="custom-file-label">Selecciona Archivo</label>
                    </div>
                    @endif
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group">
                    <div class="form-label">Contrato</div>
                    @if($empleado->em_path_contrato)
                        <a href="{{route('empleados.download_file',[$empleado->id,'CONTRATO'])}}" class="btn btn-primary btn-sm">
                            Descargar Archivo
                        </a>
                        <a href="{{route('empleados.destroy_file',[$empleado->id,'CONTRATO'])}}" class="btn btn-danger btn-sm">
                            Eliminar Archivo
                        </a>
                    @else
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="contrato_file" accept="image/jpeg,image/gif,image/png,application/pdf,image/x-eps" />
                        <label class="custom-file-label">Selecciona Archivo</label>
                    </div>
                    @endif
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

$("#frmEditEmpleado").validate({
        rules: {
            sucursal_id: "required",
            em_nombre: "required",
            em_apellido_paterno: "required",
            em_email : {
                required: true,
                email: true
            },
            em_telefono : {
                required : true,
                minlength: 10
            },
            em_cargo : "required",
            em_nss : "required",
            em_curp : "required"
        },
        messages: {
            sucursal_id: "Campo requerido",
            em_nombre: "Campo requerido",
            em_apellido_paterno: "Campo requerido",
            em_email: {
                required : "Campo requerido",
                email: "Ingresa un correo válido"
            },
            em_telefono: {
                required: "Campo requerido",
                minlength: "Ingresa un número de al menos 10 dígitos"
            },
            em_cargo : "Campo requerido",
            em_nss : "Campo requerido",
            em_curp : "Campo requerido"
        },
        submitHandler: function (form) {

            var form = document.getElementById("frmEditEmpleado");
			var formdata = new FormData(form); // high importance!

            $.ajax({
                    url: $(form).attr('action'),
                    type: 'POST',
                    data: formdata,
                    async: true,
					dataType: "JSON",
					contentType: false, // high importance!
					processData: false, // high importance!
            })
            .done(function(data) {
                if (data.returnCode == 200) {

                    swal({
                        title: "Bien",
                        text: data.msg,
                        type: "success",
                        timer: 2000,
                        showConfirmButton: false
                    });

                    oTableEmpleados.draw();
                    $("#modal-large").modal("hide");
                }else{
                    swal("¡Ocurrió un problema!", data.msg , "error");
                }
            })
            .fail(function() {
                alert("Something was wrong");
            })
            .always(function() {

            });


        return false; // required to block normal submit since you used ajax
        }
    });
</script>
