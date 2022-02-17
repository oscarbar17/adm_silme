<form action="{{route('empleados.store')}}" method="POST" autocomplete="off" id="frmNewEmpleado">
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
            <label for="message-text" class="form-control-label">Apellido Paterno:</label>
            <input type="text" name="em_apellido_paterno" class="form-control">
        </div>
        <div class="form-group">
            <label for="message-text" class="form-control-label">Apellido Materno:</label>
            <input type="text" name="em_apellido_materno" class="form-control">
        </div>
        <div class="form-group">
            <label for="message-text" class="form-control-label">Correo electrónico:</label>
            <input type="text" name="em_email" class="form-control">
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

$("#frmNewEmpleado").validate({
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
        
            $.ajax({
                    url: $(form).attr('action'),
                    type: 'POST',
                    data: $(form).serialize(),
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
                    $("#modal-medium").modal("hide");
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