<form action="{{route('sucursales.store')}}" method="POST" autocomplete="off">
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
            <input type="text" name="su_encargado" value="{{$sucursal->su_encargado}}" class="form-control">
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