@extends('layouts.default') 

@section('content')
<!-- PAGE-HEADER -->
<div class="page-header">
    <div>
        <h1 class="page-title">Empleados</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Empleados</a></li>
            <li class="breadcrumb-item active" aria-current="page">Gestión de Empleados</li>
        </ol>
    </div>
    <div class="ml-auto pageheader-btn">
        <a href="{{route('empleados.create')}}" class="btn btn-success btn-action-modal btn-icon text-white"
                data-toggle="modal" data-target="#modal-medium" >
            <span>
                <i class="fe fe-plus"></i>
            </span> Nuevo Empleado
        </a>
    </div>
</div>
<!-- PAGE-HEADER END -->
<!-- ROW-1 OPEN -->
<div class="row">
    <div class="col-md-12 col-lg-12">
        <div class="card">
            <div class="card-body table-responsive">
                <table id="table-empleados" class="table table-striped table-bordered text-nowrap w-100">
                    <thead>
                        <tr>
                            <th class="wd-15p">ID</th>
                            <th class="wd-15p">Sucursal</th>
                            <th class="wd-15p">Nombre</th>
                            <th class="wd-15p">Email</th>
                            <th class="wd-15p">Teléfono</th>
                            <th class="wd-20p">Cargo</th>
                            <th class="wd-20p">Fecha Antiguedad</th>
                            <th class="wd-20p"></th>
                        </tr>
                    </thead>
                    <tbody style="text-transform: uppercase;">
                        
                    </tbody>
                </table>
            </div>
            <!-- TABLE WRAPPER -->
        </div>
        <!-- SECTION WRAPPER -->
    </div>
</div>
<!-- ROW-1 CLOSED -->
@stop 
@push('scripts')
<script>
var oTableEmpleados = $('#table-empleados').DataTable({
        "bInfo" : false,
		processing: true,
		serverSide: true,
		bFilter : true,
		ajax: {
			url : "{!! route('empleados_index.data') !!}",
			data: function (d) {
				
			}
		},
		columns: [
            { data: 'id', name: 'id'},
			{ data: 'sucursal.su_nombre', name: 'sucursal.su_nombre'},
            { data: 'em_nombre', name: 'em_nombre'},
            { data: 'em_email', name: 'em_email'},
            { data: 'em_telefono', name: 'em_telefono'},
            { data: 'em_cargo', name: 'em_cargo'},
            { data: 'em_fecha_antiguedad', name: 'em_fecha_antiguedad'},
			{ data: 'opciones', name: 'opciones'},
		],
        
	    language : dtLang
	});

    // Confirm
    $(document).on("click", ".btn-destroy-empleados", function(e) {
        e.preventDefault();
        var route = $(this).attr('href');

		swal({
			title: "Alert",
			text: "¿Deseas eliminar el registro?",
			type: "warning",
			showCancelButton: true,
			confirmButtonText: 'Si',
			cancelButtonText: 'No'
		}, function (isConfirm) {

            if (!isConfirm) return;
                
                $.get(route, function(response){
					if (response.returnCode == 200) {
						swal("¡Hecho!", response.msg , "success");
                        oTableEmpleados.draw();
					}else{
						swal("¡Error al eliminar!", "¡Por favor intenta nuevamente!", "error");
					}
				});
            });
        
	});

    $(document).on("click",".btn-destroy-file", function(e){
        e.preventDefault();

        var route = $(this).attr('href');

        swal({
			title: "Alert",
			text: "¿Deseas eliminar el registro?",
			type: "warning",
			showCancelButton: true,
			confirmButtonText: 'Si',
			cancelButtonText: 'No'
		}, function (isConfirm) {

            if (!isConfirm) return;
                
                $.get(route, function(response){
					if (response.returnCode == 200) {
						swal("¡Hecho!", response.msg , "success");
                        oTableEmpleados.draw();
                        $("#modal-large").modal("hide");
					}else{
						swal("¡Error al eliminar!", "¡Por favor intenta nuevamente!", "error");
					}
				});
            });
        
    });

</script>
@endpush