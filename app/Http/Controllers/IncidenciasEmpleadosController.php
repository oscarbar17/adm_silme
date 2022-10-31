<?php

namespace App\Http\Controllers;

use App\Exports\IncidenciasEmpleadosExport;
use App\Models\Empleado;
use App\Models\IncidenciaEmpleado;
use App\Models\TipoIncidencia;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Excel;

class IncidenciasEmpleadosController extends Controller
{
    //
    public function index()
    {
        $tipos = TipoIncidencia::get();

        return view('incidencias_empleados.incidencias_empleados_index');
    }

    public function indexDT(Request $request)
    {
        $incidencias = IncidenciaEmpleado::where([
                            'ie_eliminado'  => false
                        ])->with(['empleado','tipo_incidencia']);
                        
        
        if($request->fecha_inicio != ""){
            $incidencias->where('ie_fecha','>=',$request->fecha_inicio);
        }

        if($request->fecha_inicio != ""){
            $incidencias->where('ie_fecha','<=',$request->fecha_fin);
        }
        
        $incidencias = $incidencias->get();

        return DataTables::of($incidencias)
                ->addColumn('nombre_empleado',function($row){
                    return $row->empleado->em_nombre. " ". $row->empleado->em_apellido_paterno. " ". $row->empleado->em_apellido_materno;
                })
                ->addColumn('opciones',function($row){
                    return '<div class="btn-list">
                            <div class="dropdown">
                                <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-cog"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item btn-destroy-incidencia" href="'.route('incidencias_empleados.destroy',[$row->id]).'"
                                            >Eliminar Incidencia</a>
                                </div>
                            </div>';
                })
                ->rawColumns(['opciones'])
                ->make(true);
    }

    public function create()
    {
        $empleados = Empleado::where(['em_eliminado' => false])
        ->select(['id',
                DB::raw('CONCAT(em_nombre , " " , em_apellido_paterno) as nombre')
                ])
        ->orderBy('nombre','asc')
        ->get();

        $tiposIncidencia = TipoIncidencia::get();

        return view('incidencias_empleados.incidencias_empleados_create',[
            'empleados' => $empleados,
            'tiposIncidencia'   => $tiposIncidencia
        ]);
    }

    public function store(Request $request)
    {
        IncidenciaEmpleado::create([
            'empleado_id'           => $request->get('empleado_id'),
            'tipo_incidencia_id'    => $request->get('tipo_incidencia_id'),
            'ie_fecha'              => Carbon::now()->format('Y-m-d'),
            'ie_comentarios'        => strtoupper($request->get('ie_comentarios'))
        ]);

        return [
            'returnCode'    => '200',
            'msg'           => 'Incidencia guardada'
        ];
    }

    public function destroy($id)
    {
        $inc = IncidenciaEmpleado::find($id);
        $inc->ie_eliminado = true;
        $inc->save();
        
        return [
            'returnCode'    => '200',
            'msg'           => 'Incidencia eliminada'
        ];
    }

    public function export(Request $request) 
    {
        return Excel::download(new IncidenciasEmpleadosExport($request->fecha_inicio,$request->fecha_fin), 'IncidenciasEmpleados.xlsx');
    }
}
