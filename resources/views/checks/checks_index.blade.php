@extends('layouts.default') 

@section('content')
<!-- PAGE-HEADER -->
<div class="page-header">
    <div>
        <h1 class="page-title">Checks</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Checks</a></li>
            <li class="breadcrumb-item active" aria-current="page">Listado de Checks</li>
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

            <form id="export-form" action="{{ route('checks.export') }}" method="POST" class="d-none">
                @csrf
                <input type="hidden" name="sucursal_id" id="sucursal_id"/>
                <input type="hidden" name="empleado_id" id="empleado_id"/>
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
                        <label for="">Fecha Inicio</label>
                        <input type="date" id="fecha-inicio" class="form-control">
                    </div>
                    <div class="col-md-3">
                        <label for="">Fecha Fin</label>
                        <input type="date" id="fecha-fin" class="form-control">
                    </div>
                    <div class="col-md-3">
                        <label for="">Estatus</label>
                        <select id="select-estatus" class="form-control">
                        <option value="">-- Select option --</option>
                            <option value="ABIERTO">ABIERTO</option>
                            <option value="CERRADO">CERRADO</option>
                            <option value="CERRADO_SISTEMA">CERRADO_SISTEMA</option>
                        </select>
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
                        <table id="table-checks" class="table table-striped table-bordered text-nowrap w-100">
                            <thead>
                                <tr>
                                    <th class="wd-15p">ID</th>
                                    <th class="wd-15p">Sucursal</th>
                                    <th class="wd-15p">Empleado</th>
                                    <th class="wd-15p">Check In</th>
                                    <th class="wd-15p">Check Out</th>
                                    <th class="wd-15p">Estatus</th>
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
var oTableChecks = $('#table-checks').DataTable({
        "bInfo" : false,
		processing: true,
		serverSide: true,
		bFilter : true,    
		ajax: {
			url : "{!! route('checks.index.data') !!}",
			data: function (d) {
				d.sucursal_id = $("#select-sucursal").val();
                d.empleado_id = $("#select-empleado").val();
                d.estatus     = $("#select-estatus").val();
                d.fecha_inicio = $("#fecha-inicio").val();
                d.fecha_fin = $("#fecha-fin").val();
			}
		},
		columns: [
            { data: 'id', name: 'id'},
            { data: 'sucursal.su_nombre', name: 'sucursal.su_nombre'},
			{ data: 'empleado', name: 'empleado'},
            { data: 'ch_check_in', name: 'ch_check_in'},
            { data: 'ch_check_out', name: 'ch_check_out'},
            { data: 'ch_estatus', name: 'ch_estatus'},
			{ data: 'opciones', name: 'opciones'},
		],
		language : dtLang
	});

    $("#btn-filtro").click(function(e){
        oTableChecks.draw();
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
        $("#estatus").val($("#select-estatus").val());
        $("#fecha_inicio").val($("#fecha-inicio").val());
        $("#fecha_fin").val($("#fecha-fin").val());
    }


</script>
@endpush