@extends('layouts.default')

@section('content')
<!-- PAGE-HEADER -->
<div class="page-header">
    <div>
        <h1 class="page-title">Incidencias Empleados</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Incidencias</a></li>
            <li class="breadcrumb-item active" aria-current="page">Incidencias de Empleados</li>
        </ol>
    </div>
    <div class="ml-auto pageheader-btn">
        <a href="{{route('incidencias_empleados.create')}}" class="btn btn-success btn-action-modal btn-icon text-white"
                data-toggle="modal" data-target="#modal-medium" >
            <span>
                <i class="fe fe-plus"></i>
            </span> Registrar Incidencia
        </a>
        <a href="#" class="btn btn-info btn-icon text-white dropdown-toggle" data-toggle="dropdown">
            <span>
                <i class="fe fe-external-link"></i>
            </span> Export <span class="caret"></span>
        </a>
        <div class="dropdown-menu" role="menu">
                <a href="javascript:void(0)" onclick="event.preventDefault(); exportXLS(); document.getElementById('export-form').submit();"
                    class="dropdown-item"><i class="bx bxs-file mr-2"></i>Export as Excel</a>
            </div>
        <form id="export-form" action="{{ route('incidencias_empleados.export') }}" method="POST" class="d-none">
            @csrf
            <input type="hidden" name="fecha_inicio" id="fecha_inicio"/>
            <input type="hidden" name="fecha_fin" id="fecha_fin"/>
        </form>
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
                        <table id="table-incidencias" class="table table-responsive table-striped table-bordered text-nowrap w-100">
                            <thead>
                                <tr>
                                    <th class="wd-15p">ID</th>
                                    <th class="wd-15p">Empleado</th>
                                    <th class="wd-15p">Tipo de Incidencia</th>
                                    <th class="wd-15p">Fecha</th>
                                    <th class="wd-20p">Comentarios</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody style="text-transform: uppercase;">

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
var oTableIncidencias = $('#table-incidencias').DataTable({
        "bInfo" : false,
		processing: true,
		serverSide: true,
		bFilter : true,
		ajax: {
			url : "{!! route('incidencias_empleados_index.data') !!}",
			data: function (d) {
				d.fecha_inicio = $("#fecha-inicio").val();
                d.fecha_fin = $("#fecha-fin").val();
			}
		},
		columns: [
            { data: 'id', name: 'id'},
            { data: 'nombre_empleado', name: 'nombre_empleado'},
            { data: 'tipo_incidencia.ti_nombre', name: 'tipo_incidencia.ti_nombre'},
            { data: 'ie_fecha', name: 'ie_fecha'},
            { data: 'ie_comentarios', name: 'ie_comentarios'},
            { data: 'opciones', name: 'opciones', searchable: false, orderable: false},

		],
		language : dtLang
	});

    // Confirm
    $(document).on("click", ".btn-destroy-incidencia", function(e) {
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
                        oTableIncidencias.draw();
					}else{
						swal("¡Error al eliminar!", "¡Por favor intenta nuevamente!", "error");
					}
				});
            });

	});
    function exportXLS(){

        $("#fecha_inicio").val($("#fecha-inicio").val());
        $("#fecha_fin").val($("#fecha-fin").val());
    }

    $("#btn-filtro").click(function(e){
        oTableEventos.draw();
    });

</script>
@endpush
