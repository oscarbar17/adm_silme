<form action="{{route('incidencias_empleados.store')}}" method="POST" autocomplete="off" id="frmNewIncidencia">
    @csrf
    <div class="modal-header">
        <h5 class="modal-title">Registro de Incidencia a Empleados</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <div class="form-group">
            <label for="message-text" class="form-control-label">Empleado:</label>
            <select name="empleado_id" class="form-control" style="text-transform:uppercase;">
            {{\App\Library\Combo::render($empleados,'','id','nombre',true)}}
            </select>
        </div>
        <div class="form-group">
            <label for="message-text" class="form-control-label">Incidencia:</label>
            <select name="tipo_incidencia_id" class="form-control" style="text-transform:uppercase;">
            {{\App\Library\Combo::render($tiposIncidencia,'','id','ti_nombre',true)}}
            </select>
        </div>
        <div class="form-group">
            <label for="message-text" class="form-control-label">Comentarios:</label>
            <input name="ie_comentarios" class="form-control" style="text-transform:uppercase;"/>
                
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Guardar Incidencia</button>
    </div>
</form>
<script>
    $("#frmNewIncidencia").validate({
        rules: {
            empleado_id: "required",
            tipo_incidencia_id: "required",
            ie_comentarios: "required",
        },
        messages: {
            empleado_id: "Campo requerido",
            tipo_incidencia_id: "Campo requerido",
            ie_comentarios : "Campo requerido"
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

                    oTableIncidencias.draw();
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