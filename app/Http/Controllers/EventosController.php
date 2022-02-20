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
        $eventos = Evento::get();

        return DataTables::of($eventos)
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
            'ev_superficie' => $request->get('ev_superficie')
        ]);

        return response()->json([
            'status'    => 'Evento registrado'
            ], 200
        );
    }
}
