<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use App\Models\Sucursal;
use App\Models\User;
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
            'em_eliminado'  => false
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
                                    <a class="dropdown-item btn-action-modal" href="'.route('empleados.edit',[$row->id]).'"
                                            data-toggle="modal" data-target="#modal-large" 
                                        >Editar</a>
                                    <a class="dropdown-item btn-destroy-empleados" href="'.route('empleados.destroy',[$row->id]).'"
                                        >Eliminar</a>
                                </div>
                            </div>';
                })
                ->rawColumns(['opciones'])
                ->make(true);
    }

    public function create()
    {
        $sucursales = Sucursal::where([
                        'su_eliminado'  => false
                    ])->orderBy('su_nombre','asc')
                    ->get();

        return view('empleados.empleados_create',[
            'sucursales'    => $sucursales
        ]);
    }

    public function store(Request $request)
    {
        //--Genera usuario de acceso
        $user = User::create([
            'name'      => $request->get('em_nombre'),
            'email'     => $request->get('em_email'),
            'rol_id'    => 2,
            'password'  => bcrypt('12345678'),
            'estatus'   => 'ACTIVO'
        ]);

        $empleado = Empleado::create([
            'sucursal_id'           => $request->get('sucursal_id'),
            'user_id'               => $user->id,
            'em_nombre'             => $request->get('em_nombre'),
            'em_apellido_paterno'   => $request->get('em_apellido_paterno'),
            'em_apellido_materno'   => $request->get('em_apellido_materno'),
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
        $empleado = Empleado::find($id);
        
        $sucursales = Sucursal::where([
            'su_eliminado'  => false
        ])->orderBy('su_nombre','asc')
        ->get();

        return view('empleados.empleados_edit',[
                'empleado'  => $empleado,
                'sucursales'=> $sucursales
        ]);
    }

    public function update(Request $request)
    {
        $empleado = Empleado::find()->update([

        ]);
    }

    public function destroy($id)
    {
        $empleado = Empleado::find($id);
        $empleado->em_eliminado = true;
        $empleado->save();

        return [
            'returnCode'    => '200',
            'msg'           => 'Empleado eliminado'
        ];
    }

    public function getDatosApi(Request $request)
    {
        $empleado_id = $request->get('empleado_id');

        $empleado = Empleado::find($empleado_id);

        if($empleado){
            
            return response()->json([
                'status'    => 'ok',
                'empleado'  => $empleado
                ], 200
            );
        }

        return response()->json([
            'status' => 'El empleado no existe'], 400
        );
    
    }
}
