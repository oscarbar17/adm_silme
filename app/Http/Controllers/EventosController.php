<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use App\Models\Evento;
use App\Models\Municipio;
use App\Models\Producto;
use App\Models\Sucursal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class EventosController extends Controller
{
    //
    public function index()
    {
        $sucursales = Sucursal::where(['su_eliminado' => false])
                    ->orderBy('su_nombre','asc')->get();

        $empleados = Empleado::where(['em_eliminado' => false])
        ->select(['id',
                DB::raw('CONCAT(em_nombre , " " , em_apellido_paterno) as nombre')
                ])
        ->get();

        $cultivos = Producto::where(['pr_eliminado' => false])
                        ->orderBy('pr_nombre','asc')->get();

        $municipios = Municipio::orderBy('mu_nombre','asc')->get();

        return view('eventos.eventos_index',[
            'sucursales'    => $sucursales,
            'empleados'     => $empleados,
            'cultivos'      => $cultivos,
            'municipios'    => $municipios
        ]);
    }

    public function indexDT(Request $request)
    {
        $eventos = Evento::with([
                        'sucursal','municipio','empleado','productor','producto'
                    ])->get();

        return DataTables::of($eventos)
                ->addColumn('empleado',function($row){
                    return $row->empleado->em_nombre . ' ' . $row->empleado->em_apellido_paterno;
                })
                ->addColumn('opciones',function($row){
                    return '<div class="btn-list">
                            <div class="dropdown">
                                <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-cog"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item btn-action-modal" href="'.route('eventos.show',[$row->id]).'"
                                            data-toggle="modal" data-target="#modal-large">Detalles del Evento</a>
                                </div>
                            </div>';
                })
                ->rawColumns(['opciones'])
                ->make(true);
    }

    public function storeApi(Request $request)
    {
        $evento = Evento::create([
            'empleado_id'   => $request->get('empleado_id'),
            'productor_id'  => $request->get('productor_id'),
            'municipio_id'  => $request->get('municipio_id'),
            'marca_id'      => $request->get('marca_id'),
            'producto_id'   => $request->get('producto_id'),
            'ev_superficie' => $request->get('ev_superficie'),
            'ev_tipo_cultivo'=> $request->get('ev_tipo_cultivo'),
            'ev_latitud'    => $request->get('ev_latitud'),
            'ev_longitud'   => $request->get('ev_longitud'),
            'ev_notas'      => $request->get('ev_notas'),
            'ev_tipo_evento'=> $request->get('ev_tipo_evento'),
            'sucursal_id'   => $request->get('sucursal_id')
        ]);

        return response()->json([
            'status'    => 'Evento registrado'
            ], 200
        );
    }

    public function show($id)
    {
        $evento = Evento::find($id);
        
    }

    public function getEventoApi(Request $request)
    {
        $evento = Evento::with(['sucursal','empleado','productor','municipio','marca','producto'])->findOrFail($request->get('evento_id'));

        return response()->json([
            'status'    => 'ok',
            'evento'    => $evento
            ], 200
        ); 
    }

    public function getEventosApi(Request $request)
    {
        $eventos = Evento::whereMonth('created_at',$request->get('mes'))
                            ->whereYear('created_at',$request->get('anio'))
                            ->where('empleado_id',$request->get('empleado_id'))
                            ->get();

        return response()->json([
            'status'    => 'ok',
            'eventos'   => $eventos
            ], 200
        );
    }
}
