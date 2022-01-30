@extends('layouts.default') 

@section('content')
<!-- PAGE-HEADER -->
<div class="page-header">
    <div>
        <h1 class="page-title">Productores</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Catálogos</a></li>
            <li class="breadcrumb-item active" aria-current="page">Gestión de Productores</li>
        </ol>
    </div>
    <div class="ml-auto pageheader-btn">
        <div class="btn-list">
            <a href="{{route('productores.create')}}" class="btn btn-info btn-icon text-white btn-action-modal" 
                    data-toggle="modal" data-target="#modal-medium">
                <span>
                    <i class="fe fe-plus"></i> Agregar Productor
                </span>
            </a>
        </div>
    </div>
</div>
<!-- PAGE-HEADER END -->
<!-- ROW-1 OPEN -->
<div class="row">
    <div class="col-md-12 col-lg-12">
        <div class="card">
            <div class="card-body">
                <table id="table-productores" class="table table-striped table-bordered text-nowrap w-100">
                    <thead>
                        <tr>
                            <th class="wd-15p">ID</th>
                            <th class="wd-15p">Productor</th>
                            <th class="wd-20p">Cultivo</th>
                            <th class="wd-20p">Correo</th>
                            <th class="wd-20p">Teléfono</th>
                            <th class="wd-20p">Municipio</th>
                            <th class="wd-20p">Producto</th>
                            <th class="wd-20p"></th>
                        </tr>
                    </thead>
                    <tbody>
                        
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
var oTableProductores = $('#table-productores').DataTable({
        "bInfo" : false,
		processing: true,
		serverSide: true,
		bFilter : true,    
		ajax: {
			url : "{!! route('productores_index.data') !!}",
			data: function (d) {
				
			}
		},
		columns: [
            { data: 'id', name: 'id'},
			{ data: 'pr_nombre', name: 'pr_nombre'},
            { data: 'pr_cultivo', name: 'pr_cultivo'},
            { data: 'pr_correo', name: 'pr_correo'},
            { data: 'pr_telefono', name: 'pr_telefono'},
            { data: 'pr_municipio', name: 'pr_municipio'},
            { data: 'producto.pr_nombre', name: 'producto.pr_nombre'},
			{ data: 'opciones', name: 'opciones'},
		],
		language : dtLang
	});

    // Confirm
    $(document).on("click", ".btn-destroy-productores", function(e) {
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
                        oTableProductores.draw();
					}else{
						swal("¡Error al eliminar!", "¡Por favor intenta nuevamente!", "error");
					}
				});
            });
        
	});


</script>
@endpush