<form action="{{route('marcas.store')}}" method="POST" autocomplete="off" 
    class="needs-validation" >
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
            <input type="text" name="ma_nombre" class="form-control" required>
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

<script>
    (function() {
        'use strict';
        window.addEventListener('load', function() {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName('needs-validation');
        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
            if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
            }
            form.classList.add('was-validated');
        }, false);
        });
        }, false);
    })();
</script>