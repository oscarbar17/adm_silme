<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use App\Models\Sucursal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\DataTables;

class EmpleadosController extends Controller
{
    //
    public function index()
    {
        return view('empleados.empleados_index');
    }

    public function indexDT(Request $request)
    {
        $empleados = Empleado::where([
            //'ma_eliminado'  => false
        ])->with([
            'sucursal'
        ])->get();

        return DataTables::of($empleados)
                ->addColumn('opciones',function($row){
                    return '<div class="btn-list">
                            <div class="dropdown">
                                <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-cog"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="javascript:void(0)">Editar</a>
                                    <a class="dropdown-item" href="javascript:void(0)">Eliminar</a>
                                </div>
                            </div>';
                })
                ->rawColumns(['opciones'])
                ->make(true);
    }

    public function create()
    {
        $sucursales = Sucursal::get();

        return view('empleados.empleados_create',[
            'sucursales'    => $sucursales
        ]);
    }

    public function store(Request $request)
    {
        $empleado = Empleado::create([
            'sucursal_id'           => $request->get('sucursal_id'),
            'em_nombre'             => $request->get('em_nombre'),
            'em_fecha_nacimiento'   => $request->get('em_fecha_nacimiento'),
            'em_nss'                => $request->get('em_nss'),
            'em_curp'               => $request->get('em_curp'),
            'em_telefono'           => $request->get('em_telefono'),
            'em_cargo'              => $request->get('em_cargo'),
            'em_fecha_antiguedad'   => $request->get('em_fecha_antiguedad'),

        ]);

        return [
            'returnCode'    => '200',
            'msg'           => 'Empleado creado'
        ];
    }

    public function edit($id)
    {

    }

    public function update()
    {

    }

    public function destroy()
    {
        
    }

}
