<form action="{{route('productores.store')}}" method="POST" autocomplete="off" id="frmNewProductor">
    {{csrf_field()}}
    <div class="modal-header">
        <h5 class="modal-title">Nuevo Productor</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <div class="form-group">
            <label for="message-text" class="form-control-label">Cultivo:</label>
            <select name="producto_id" class="form-control">
                {{\App\Library\Combo::render($productos,'','id','pr_nombre',false)}}
            </select>
        </div>
        <div class="form-group">
            <label for="message-text" class="form-control-label">Nombre de Productor:</label>
            <input type="text" name="pr_nombre" class="form-control">
        </div>
        <div class="form-group">
            <label for="message-text" class="form-control-label">Tipo de Cultivo:</label>
            <select name="pr_cultivo" class="form-control">
                <option value="RIEGO">RIEGO</option>
                <option value="TEMPORAL">TEMPORAL</option>
            </select>
        </div>
        <div class="form-group">
            <label for="message-text" class="form-control-label">Correo:</label>
            <input type="text" name="pr_correo" class="form-control">
        </div>
        <div class="form-group">
            <label for="message-text" class="form-control-label">Teléfono:</label>
            <input type="text" name="pr_telefono" class="form-control">
        </div>
        <div class="form-group">
            <label for="message-text" class="form-control-label">Municipio:</label>
            <select name="municipio_id" class="form-control">
                {{\App\Library\Combo::render($municipios,'','id','mu_nombre',false)}}
            </select>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Guardar Productor</button>
    </div>
</form>
<script>
    $("#frmNewProductor").validate({
        rules: {
            producto_id: "required",
            pr_nombre : "required",         
            pr_correo: {
                required: true,
                email: true
            },
            pr_telefono: {
                required: true,
                minlength: 10
            },
            municipio_id : "required"
        },
        messages: {
            producto_id: "Campo requerido",
            pr_nombre : "Campo requerido",
            pr_correo : "Ingresa un correo válido",
            pr_telefono: {
                required: "Campo requerido",
                minlength: "Ingresa un número de al menos 10 dígitos"
            },
            municipio_id : "Campo requerido",
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

                    oTableProductores.draw();
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