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
            <a href="#" class="btn btn-info btn-icon text-white dropdown-toggle" data-toggle="dropdown">
                <span>
                    <i class="fe fe-external-link"></i>
                </span> Export <span class="caret"></span>
            </a>
            <div class="dropdown-menu" role="menu">
                <a href="javascript:void(0)" onclick="event.preventDefault(); exportXLS(); document.getElementById('export-form').submit();"
                    class="dropdown-item"><i class="bx bxs-file mr-2"></i>Export as Excel</a>
            </div>

            <form id="export-form" action="{{ route('events.export') }}" method="POST" class="d-none">
                @csrf
                <input type="hidden" name="sucursal_id" id="sucursal_id"/>
                <input type="hidden" name="empleado_id" id="empleado_id"/>
                <input type="hidden" name="cultivo_id" id="cultivo_id"/>
                <input type="hidden" name="municipio_id" id="municipio_id"/>
                <input type="hidden" name="tipo_evento" id="tipo_evento"/>
                <input type="hidden" name="estatus" id="estatus"/>
                <input type="hidden" name="fecha_inicio" id="fecha_inicio"/>
                <input type="hidden" name="fecha_fin" id="fecha_fin"/>
            </form>
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
                        <select id="select-sucursal" class="form-control" style="text-transform:uppercase;">
                        {{\App\Library\Combo::render($sucursales,'','id','su_nombre',true)}}
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="">Empleado</label>
                        <select id="select-empleado" class="form-control" style="text-transform:uppercase;">
                        {{\App\Library\Combo::render($empleados,'','id','nombre',true)}}
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="">Cultivo</label>
                        <select id="select-producto" class="form-control" style="text-transform:uppercase;">
                        {{\App\Library\Combo::render($cultivos,'','id','pr_nombre',true)}}
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="">Municipio</label>
                        <select id="select-municipio" class="form-control" style="text-transform:uppercase;">
                        {{\App\Library\Combo::render($municipios,'','id','mu_nombre',true)}}
                        </select>
                    </div>
                    <br>
                    <div class="col-md-3">
                        <label for="">Tipo de Evento</label>
                        <select id="select-tipo-evento" class="form-control" style="text-transform:uppercase;">
                            <option value="">-- Select option -- </option>
                            <option value="CAPACITACION">CAPACITACION</option>
                            <option value="MOSTRADOR">MOSTRADOR</option>
                            <option value="SALIDA A CAMPO">SALIDA A CAMPO</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="">Estatus</label>
                        <select id="select-estatus" class="form-control" style="text-transform:uppercase;">
                            <option value="">-- Select option -- </option>
                            <option value="ABIERTO">ABIERTO</option>
                            <option value="CERRADO">CERRADO</option>
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
                    <div class="col-md-12 table-responsive">
                        <table id="table-marcas" class="table table-striped table-bordered text-nowrap w-100">
                            <thead>
                                <tr>
                                    <th class="wd-15p">ID</th>
                                    <th class="wd-15p">Sucursal</th>
                                    <th class="wd-15p">Empleado</th>
                                    <th class="wd-15p">Cultivo</th>
                                    <th class="wd-15p">Tipo de Cultivo</th>
                                    <th class="wd-20p">Municipio</th>
                                    <th class="wd-20p">Tipo de Evento</th>
                                    <th class="wd-20p">Estatus</th>
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
                d.tipo_evento = $("#select-tipo-evento").val();
                d.estatus = $("#select-estatus").val();
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
            { data: 'ev_tipo_evento', name: 'ev_tipo_evento'},
            { data: 'ev_estatus', name: 'ev_estatus'},
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

    function exportXLS(){

        $("#sucursal_id").val($("#select-sucursal").val());
        $("#empleado_id").val($("#select-empleado").val());
        $("#cultivo_id").val($("#select-producto").val());
        $("#municipio_id").val($("#select-municipio").val());
        $("#tipo_evento").val($("#select-tipo-evento").val());
        $("#estatus").val($("#select-estatus").val());
        $("#fecha_inicio").val($("#fecha-inicio").val());
        $("#fecha_fin").val($("#fecha-fin").val());
    }

</script>
@endpush
