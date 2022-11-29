<form action="{{route('productores.update')}}" method="POST" autocomplete="off" id="frmEditProductor">
    {{csrf_field()}}
    <input type="hidden" name="id" value="{{$productor->id}}"/>
    <div class="modal-header">
        <h5 class="modal-title" id="example-Modal3">Editar Productor</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <div class="form-group">
            <label for="message-text" class="form-control-label">Cultivo:</label>
            <select name="producto_id" class="form-control" style="text-transform:uppercase;">
                {{\App\Library\Combo::render($productos,$productor->producto_id,'id','pr_nombre',false)}}
            </select>
        </div>
        <div class="form-group">
            <label for="message-text" class="form-control-label">Nombre de Productor:</label>
            <input type="text" name="pr_nombre" value="{{$productor->pr_nombre}}" class="form-control" style="text-transform:uppercase;">
        </div>
        <div class="form-group">
            <label for="message-text" class="form-control-label">Tipo de Cultivo:</label>
            <select name="pr_cultivo" class="form-control" style="text-transform:uppercase;">
                <option value="RIEGO" @if($productor->pr_cultivo == 'RIEGO') selected @endif>RIEGO</option>
                <option value="TEMPORAL" @if($productor->pr_cultivo == 'TEMPORAL') selected @endif>TEMPORAL</option>
            </select>
        </div>
        <div class="form-group">
            <label for="message-text" class="form-control-label">Correo:</label>
            <input type="text" name="pr_correo" value="{{$productor->pr_correo}}" class="form-control" style="text-transform:uppercase;">
        </div>
        <div class="form-group">
            <label for="message-text" class="form-control-label">Teléfono:</label>
            <input type="text" name="pr_telefono" value="{{$productor->pr_telefono}}" class="form-control" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
        </div>
        <div class="form-group">
            <label for="message-text" class="form-control-label">Municipio:</label>
            <select name="municipio_id" class="form-control" style="text-transform:uppercase;">
                {{\App\Library\Combo::render($municipios,$productor->municipio_id,'id','mu_nombre',false)}}
            </select>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Guardar Productor</button>
    </div>
</form>

<script>
    $("#frmEditProductor").validate({
        rules: {
            producto_id: "required",
            pr_nombre : "required",         
            /*pr_correo: {
                required: true,
                email: true
            },*/
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