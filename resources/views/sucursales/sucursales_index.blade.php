@extends('layouts.default') 

@section('content')
<!-- PAGE-HEADER -->
<div class="page-header">
    <div>
        <h1 class="page-title">Sucursales</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Catálogos</a></li>
            <li class="breadcrumb-item active" aria-current="page">Gestión de Sucursales</li>
        </ol>
    </div>
    <div class="ml-auto pageheader-btn">
        <div class="btn-list">
            <a href="{{route('sucursales.create')}}" class="btn btn-success btn-icon text-white btn-action-modal" 
                    data-toggle="modal" data-target="#modal-medium">
                <span>
                    <i class="fe fe-plus"></i> Agregar Sucursal
                </span>
            </a>
            <a href="#" class="btn btn-info btn-icon text-white dropdown-toggle" data-toggle="dropdown">
                <span>
                    <i class="fe fe-external-link"></i>
                </span> Export <span class="caret"></span>
            </a>
            <div class="dropdown-menu" role="menu">
                <a href="{{route('sucursales.export')}}" class="dropdown-item"><i class="bx bxs-file mr-2"></i>Export as Excel</a>
            </div>
        </div>
    </div>
</div>
<!-- PAGE-HEADER END -->
<!-- ROW-1 OPEN -->
<div class="row">
    <div class="col-md-12 col-lg-12">
        <div class="card">
            <div class="card-body table-responsive">
                <table id="table-sucursales" class="table table-striped table-bordered text-nowrap w-100">
                    <thead>
                        <tr>
                            <th class="wd-15p">ID</th>
                            <th class="wd-15p">Nombre</th>
                            <th class="wd-20p">Encargado</th>
                            <th class="wd-20p">Teléfono</th>
                            <th class="wd-20p">Latitud</th>
                            <th class="wd-20p">Longitud</th>
                            <th class="wd-20p">Metros Geocerca</th>
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
var oTableSucursales = $('#table-sucursales').DataTable({
        "bInfo" : false,
		processing: true,
		serverSide: true,
		bFilter : true,    
		ajax: {
			url : "{!! route('sucursales_index.data') !!}",
			data: function (d) {
				
			}
		},
		columns: [
            { data: 'id', name: 'id'},						
			{ data: 'su_nombre', name: 'su_nombre'},
            { data: 'encargado', name: 'encargado'},
            { data: 'su_telefono', name: 'su_telefono'},
            { data: 'su_latitud', name: 'su_latitud'},
            { data: 'su_longitud', name: 'su_longitud'},
            { data: 'su_metros_geocerca', name: 'su_metros_geocerca'},
			{ data: 'opciones', name: 'opciones'},
		],
		language : dtLang
	});

    // Confirm
    $(document).on("click", ".btn-destroy-sucursales", function(e) {
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
                        oTableSucursales.draw();
					}else{
						swal("¡Error al eliminar!", "¡Por favor intenta nuevamente!", "error");
					}
				});
            });
        
	});

</script>
@endpush