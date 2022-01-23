<form action="{{route('productos.update')}}" method="POST" autocomplete="off">
    {{csrf_field()}}
    <input type="hidden" name="id" value="{{$producto->id}}">
    <div class="modal-header">
        <h5 class="modal-title" id="example-Modal3">Editar Producto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <div class="form-group">
            <label for="message-text" class="form-control-label">Nombre del Producto:</label>
            <input type="text" name="pr_nombre" value="{{$producto->pr_nombre}}" class="form-control">
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Guardar Producto</button>
    </div>
</form>