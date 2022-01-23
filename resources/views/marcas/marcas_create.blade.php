<form action="{{route('marcas.store')}}" method="POST" autocomplete="off">
    {{csrf_field()}}
    <div class="modal-header">
        <h5 class="modal-title" id="example-Modal3">Nueva Marca</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <div class="form-group">
            <label for="message-text" class="form-control-label">Nombre de la Marca:</label>
            <input type="text" name="ma_nombre" class="form-control">
        </div>
        <div class="form-group">
            <label for="message-text" class="form-control-label">Producto:</label>
            <input type="text" name="ma_producto" class="form-control">
        </div>
        <div class="form-group">
            <label for="message-text" class="form-control-label">Contacto:</label>
            <input type="text" name="ma_contacto" class="form-control">
        </div>
        <div class="form-group">
            <label for="message-text" class="form-control-label">Teléfono:</label>
            <input type="text" name="ma_telefono" class="form-control">
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Guardar Marca</button>
    </div>
</form>