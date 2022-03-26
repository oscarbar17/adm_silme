<?php

namespace App\Http\Controllers;

use App\Exports\SucursalesExport;
use App\Models\Empleado;
use App\Models\Sucursal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\DataTables;
use Excel;

class SucursalesController extends Controller
{
    //
    public function index()
    {
        return view('sucursales.sucursales_index');
    }

    public function indexDT(Request $request)
    {
        $sucursales = Sucursal::where([
            'su_eliminado'  => false
        ])->get();

        return DataTables::of($sucursales)
                ->addColumn('opciones',function($row){
                    return '<div class="btn-list">
                            <div class="dropdown">
                                <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-cog"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item btn-action-modal" href="'.route('sucursales.edit',[$row->id]).'"
                                            data-toggle="modal" data-target="#modal-medium"
                                    >Editar</a>
                                    <a class="dropdown-item btn-destroy-sucursales" href="'.route('sucursales.destroy',[$row->id]).'">Eliminar</a>
                                </div>
                            </div>';
                })
                ->addColumn('encargado',function($row){
                    #return $row->empleado_id;
                    if($row->empleado_id){
                        $empleado = Empleado::find($row->empleado_id);
                        return $empleado->em_nombre . ' '.  $empleado->em_apellido_paterno;
                    }
                    return '--';
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
                            ->get();

        return view('sucursales.sucursales_create',[
            'empleados' => $empleados
        ]);
    }

    public function store(Request $request)
    {
        $sucursal = Sucursal::create([
            'su_nombre'         => $request->get('su_nombre'), 
            'empleado_id'       => $request->get('empleado_id'),
            'su_telefono'       => $request->get('su_telefono'), 
            'su_latitud'        => $request->get('su_latitud'), 
            'su_longitud'       => $request->get('su_longitud'),
            'su_metros_geocerca'=> $request->get('su_metros_geocerca')
        ]);

        return [
            'returnCode'    => '200',
            'msg'           => 'Sucursal guardada'
        ];
    }

    public function edit($id)
    {
        $sucursal = Sucursal::find($id);
        
        $empleados = Empleado::where(['em_eliminado' => false])
        ->select(['id',
                DB::raw('CONCAT(em_nombre , " " , em_apellido_paterno) as nombre')
                ])
        ->get();

        return view('sucursales.sucursales_edit',[
            'sucursal'  => $sucursal,
            'empleados' => $empleados
        ]);
    }

    public function update(Request $request)
    {
        $sucursal = Sucursal::find($request->get('id'));
        $sucursal->su_nombre          = $request->get('su_nombre'); 
        $sucursal->empleado_id        = $request->get('empleado_id');
        $sucursal->su_telefono        = $request->get('su_telefono'); 
        $sucursal->su_latitud         = $request->get('su_latitud'); 
        $sucursal->su_longitud        = $request->get('su_longitud');
        $sucursal->su_metros_geocerca = $request->get('su_metros_geocerca');
        $sucursal->save();

        return [
            'returnCode'    => '200',
            'msg'           => 'Sucursal actualizada'
        ];
    }

    public function destroy($id)
    {
        $sucursal = Sucursal::find($id);
        $sucursal->su_eliminado = true;
        $sucursal->save();

        return [
            'returnCode'    => '200',
            'msg'           => 'Sucursal Eliminada'
        ];
    }

    public function export() 
    {
        return Excel::download(new SucursalesExport, 'Sucursales.xlsx');
    }
}
