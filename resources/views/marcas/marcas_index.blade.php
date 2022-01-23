@extends('layouts.default') 

@section('content')
<!-- PAGE-HEADER -->
<div class="page-header">
    <div>
        <h1 class="page-title">Marcas</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Catálogos</a></li>
            <li class="breadcrumb-item active" aria-current="page">Gestión de Marcas</li>
        </ol>
    </div>
    <div class="ml-auto pageheader-btn">
        <div class="btn-list">
            <a href="{{route('marcas.create')}}" class="btn btn-info btn-icon text-white btn-action-modal" 
                    data-toggle="modal" data-target="#modal-medium">
                <span>
                    <i class="fe fe-plus"></i> Agregar Marca
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
                <table id="table-marcas" class="table table-striped table-bordered text-nowrap w-100">
                    <thead>
                        <tr>
                            <th class="wd-15p">ID</th>
                            <th class="wd-15p">Marca</th>
                            <th class="wd-15p">Producto</th>
                            <th class="wd-15p">Contacto</th>
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
var oTableMarcas = $('#table-marcas').DataTable({
        "bInfo" : false,
		processing: true,
		serverSide: true,
		bFilter : true,    
		ajax: {
			url : "{!! route('marcas_index.data') !!}",
			data: function (d) {
				
			}
		},
		columns: [
            { data: 'id', name: 'id'},
			{ data: 'ma_nombre', name: 'ma_nombre'},
            { data: 'ma_producto', name: 'ma_producto'},
            { data: 'ma_contacto', name: 'ma_contacto'},
            { data: 'opciones', name: 'opciones'},
			
		],
		language : dtLang
	});


</script>
@endpush