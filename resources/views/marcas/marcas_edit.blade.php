<form action="{{route('marcas.update')}}" method="POST" autocomplete="off">
    <input type="hidden" name="id" value="{{$marca->id}}">
    {{csrf_field()}}
    <div class="modal-header">
        <h5 class="modal-title" id="example-Modal3">Editar Marca</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <div class="form-group">
            <label for="message-text" class="form-control-label">Nombre de la Marca:</label>
            <input type="text" name="ma_nombre" value="{{$marca->ma_nombre}}" class="form-control">
        </div>
        <div class="form-group">
            <label for="message-text" class="form-control-label">Producto:</label>
            <input type="text" name="ma_producto" value="{{$marca->ma_producto}}" class="form-control">
        </div>
        <div class="form-group">
            <label for="message-text" class="form-control-label">Contacto:</label>
            <input type="text" name="ma_contacto" value="{{$marca->ma_contacto}}" class="form-control">
        </div>
        <div class="form-group">
            <label for="message-text" class="form-control-label">Teléfono:</label>
            <input type="text" name="ma_telefono" value="{{$marca->ma_telefono}}" class="form-control">
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Actualizar Marca</button>
    </div>
</form>