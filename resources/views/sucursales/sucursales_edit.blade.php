<form action="{{route('sucursales.update')}}" method="POST" autocomplete="off" id="frmEditSucursal">
    <input type="hidden" name="id" value="{{$sucursal->id}}"/>
    {{csrf_field()}}
    <div class="modal-header">
        <h5 class="modal-title" id="example-Modal3">Editar Sucursal</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <div class="form-group">
            <label for="message-text" class="form-control-label">Nombre de la sucursal:</label>
            <input type="text" name="su_nombre" value="{{$sucursal->su_nombre}}" class="form-control">
        </div>
        <div class="form-group">
            <label for="message-text" class="form-control-label">Encargado de la sucursal:</label>
            <select name="empleado_id" class="form-control">
                {{\App\Library\Combo::render($empleados,$sucursal->empleado_id,'id','nombre',true)}}
            </select>
        </div>
        <div class="form-group">
            <label for="message-text" class="form-control-label">Teléfono de la sucursal:</label>
            <input type="text" name="su_telefono" value="{{$sucursal->su_telefono}}" class="form-control">
        </div>
        <div class="form-group">
            <label for="message-text" class="form-control-label">Latitud:</label>
            <input type="text" name="su_latitud" value="{{$sucursal->su_latitud}}" class="form-control">
        </div>
        <div class="form-group">
            <label for="message-text" class="form-control-label">Longitud:</label>
            <input type="text" name="su_longitud" value="{{$sucursal->su_longitud}}" class="form-control">
        </div>
        <div class="form-group">
            <label for="message-text" class="form-control-label">Metros Geocerca:</label>
            <input type="text" name="su_metros_geocerca" value="{{$sucursal->su_metros_geocerca}}" class="form-control">
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Actualizar Sucursal</button>
    </div>
</form>
<script>
    $("#frmEditSucursal").validate({
        rules: {
            su_nombre: "required",
            su_telefono : {
                required : true,
                minlength: 10
            },
            su_latitud : "required",
            su_longitud : "required",
            su_metros_geocerca : "required"
        },
        messages: {
            su_nombre: "Campo requerido",
            su_telefono: {
                required: "Campo requerido",
                minlength: "Ingresa un número de al menos 10 dígitos"
            },
            su_latitud : "Campo requerido",
            su_longitud : "Campo requerido",
            su_metros_geocerca : "Campo requerido"
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

                    oTableSucursales.draw();
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