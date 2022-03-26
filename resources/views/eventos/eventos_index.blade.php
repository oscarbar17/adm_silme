@extends('layouts.default') 

@section('content')
<!-- PAGE-HEADER -->
<div class="page-header">
    <div>
        <h1 class="page-title">Eventos</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Eventos</a></li>
            <li class="breadcrumb-item active" aria-current="page">Eventos o Ventas</li>
        </ol>
    </div>
    <div class="ml-auto pageheader-btn">
        <div class="btn-list">
            
        </div>
    </div>
</div>
<!-- PAGE-HEADER END -->
<!-- ROW-1 OPEN -->
<div class="row">
    <div class="col-md-12 col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3">
                        <label for="">Sucursal</label>
                        <select id="select-sucursal" class="form-control">
                        {{\App\Library\Combo::render($sucursales,'','id','su_nombre',true)}}
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="">Empleado</label>
                        <select id="select-empleado" class="form-control">
                        {{\App\Library\Combo::render($empleados,'','id','nombre',true)}}
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="">Cultivo</label>
                        <select id="select-producto" class="form-control">
                        {{\App\Library\Combo::render($cultivos,'','id','pr_nombre',true)}}
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="">Municipio</label>
                        <select id="select-municipio" class="form-control">
                        {{\App\Library\Combo::render($municipios,'','id','mu_nombre',true)}}
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="">Fecha Inicio</label>
                        <input type="date" id="fecha-inicio" class="form-control">
                    </div>
                    <div class="col-md-3">
                        <label for="">Fecha Fin</label>
                        <input type="date" id="fecha-fin" class="form-control">
                    </div>
                    <div class="col-md-3">
                        <br>
                        <button type="button" class="btn btn-success" id="btn-filtro">
                            Filtrar
                        </button>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-12">
                        <table id="table-marcas" class="table table-striped table-bordered text-nowrap w-100">
                            <thead>
                                <tr>
                                    <th class="wd-15p">ID</th>
                                    <th class="wd-15p">Sucursal</th>
                                    <th class="wd-15p">Empleado</th>
                                    <th class="wd-15p">Cultivo</th>
                                    <th class="wd-15p">Tipo de Cultivo</th>
                                    <th class="wd-20p">Municipio</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
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
var oTableEventos = $('#table-marcas').DataTable({
        "bInfo" : false,
		processing: true,
		serverSide: true,
		bFilter : true,    
		ajax: {
			url : "{!! route('events.index.data') !!}",
			data: function (d) {
				d.sucursal_id = $("#select-sucursal").val();
                d.empleado_id = $("#select-empleado").val();
                d.producto_id = $("#select-producto").val();
                d.municipio_id= $("#select-municipio").val();
                d.fecha_inicio= $("#fecha-inicio").val();
                d.fecha_fin = $("#fecha-fin").val();
			}
		},
		columns: [
            { data: 'id', name: 'id'},
            { data: 'sucursal.su_nombre', name: 'sucursal.su_nombre'},
			{ data: 'empleado', name: 'empleado'},
            { data: 'producto.pr_nombre', name: 'producto.pr_nombre'},
            { data: 'productor.pr_cultivo', name: 'productor.pr_cultivo'},
            { data: 'municipio.mu_nombre', name: 'municipio.mu_nombre'},
			{ data: 'opciones', name: 'opciones'},
		],
		language : dtLang
	});

    $("#btn-filtro").click(function(e){
        oTableEventos.draw();
    });

    // Confirm
    $(document).on("click", ".btn-destroy-marcas", function(e) {
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
                        oTableEventos.draw();
					}else{
						swal("¡Error al eliminar!", "¡Por favor intenta nuevamente!", "error");
					}
				});
            });
        
	});

</script>
@endpush