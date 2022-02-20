<form action="{{route('productores.update')}}" method="POST" autocomplete="off">
    {{csrf_field()}}
    <div class="modal-header">
        <h5 class="modal-title" id="example-Modal3">Editar Productor</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <div class="form-group">
            <label for="message-text" class="form-control-label">Cultivo:</label>
            <select name="producto_id" class="form-control">
                {{\App\Library\Combo::render($productos,$productor->producto_id,'id','pr_nombre',false)}}
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
                {{\App\Library\Combo::render($municipios,$productor->municipio_id,'id','mu_nombre',false)}}
            </select>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Guardar Productor</button>
    </div>
</form>