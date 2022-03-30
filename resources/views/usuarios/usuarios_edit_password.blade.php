<form action="{{route('usuarios.update_password')}}" method="POST" autocomplete="off" id="frmEditPassword">
    <input type="hidden" name="id" value="{{$usuario->id}}">
    @csrf
    <div class="modal-header">
        <h5 class="modal-title" id="example-Modal3">Cambiar contraseña</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <div class="form-group">
            <label for="message-text" class="form-control-label">Nueva contraseña:</label>
            <input type="password" name="new_password" id="new_password" class="form-control">
        </div>
        <div class="form-group">
            <label for="message-text" class="form-control-label">Confirma Nueva contraseña:</label>
            <input type="password" name="new_password_confirm" id="new_password_confirm" class="form-control">
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Actualizar Contraseña</button>
    </div>
</form>

<script>
    $("#frmEditPassword").validate({
        rules: {
            new_password: {
                    required: true,
                    minlength : 6
                },
            new_password_confirm: {
                    required: true,
                    minlength : 6,
                    equalTo: "#new_password"
                    }
        },
        messages: {
            new_password: {
                required: "Ingresa una nueva contraseña",
                minlength: "La contraseña debe ser mínima de 6 caracteres"
            },
            new_password_confirm: {
                required: "Por favor ingresa la nueva contraseña.",
                minlength: "La contraseña debe ser mínima de 6 caracteres",
                equalTo: "Ingresa la misma contraseña"
            }
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

                    oTableUsuarios.draw();
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