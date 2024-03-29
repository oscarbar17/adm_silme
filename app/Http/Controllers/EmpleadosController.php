<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use App\Models\Rol;
use App\Models\Sucursal;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
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
                                <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">
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
        $roles = Rol::get();

        $sucursales = Sucursal::where([
                        'su_eliminado'  => false
                    ])->orderBy('su_nombre','asc')
                    ->get();

        return view('empleados.empleados_create',[
            'roles'         => $roles,
            'sucursales'    => $sucursales
        ]);
    }

    public function store(Request $request)
    {
        $password = uniqid();

        $userExist = User::where('email',$request->em_email)->first();

        if($userExist){
            return [
                'returnCode'    => '500',
                'msg'           => 'El correo ya existe, no se ha registrado el empleado'
            ];
        }

        //--Genera usuario de acceso
        $user = User::create([
            'name'      => strtoupper($request->get('em_nombre')),
            'email'     => strtoupper($request->get('em_email')),
            'rol_id'    => $request->rol_id,
            'password'  => bcrypt($password),
            'estatus'   => 'ACTIVO'
        ]);

        $empleado = Empleado::create([
            'sucursal_id'           => $request->get('sucursal_id'),
            'user_id'               => $user->id,
            'em_nombre'             => $request->get('em_nombre'),
            'em_apellido_paterno'   => strtoupper($request->get('em_apellido_paterno')),
            'em_apellido_materno'   => strtoupper($request->get('em_apellido_materno')),
            'em_email'              => strtoupper($request->get('em_email')),
            'em_fecha_nacimiento'   => $request->get('em_fecha_nacimiento'),
            'em_nss'                => strtoupper($request->get('em_nss')),
            'em_curp'               => strtoupper($request->get('em_curp')),
            'em_telefono'           => $request->get('em_telefono'),
            'em_cargo'              => strtoupper($request->get('em_cargo')),
            'em_fecha_antiguedad'   => $request->get('em_fecha_antiguedad'),
            'em_contacto_emergencia'=> $request->get('em_contacto_emergencia')

        ]);


        $emailData = [
            'email'        => $request->get('em_email'),
            'password'     => $password,
            'login'        => route('login.create')
        ];

        Mail::send ( 'emails.email_nuevo_usuario', $emailData, function ($message) use ($emailData) {
            $message->to ( $emailData['email'] );
                
            $message->from ( env('MAIL_FROM_ADDRESS') , env('MAIL_FROM_NAME') );
            $message->subject ( __('Credenciales de acceso') );
            
        } );


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

        $usuario = User::find($empleado->user_id);

        $roles = Rol::get();

        return view('empleados.empleados_edit',[
                'empleado'  => $empleado,
                'sucursales'=> $sucursales,
                'roles'     => $roles,
                'usuario'   => $usuario
        ]);
    }

    public function update(Request $request)
    {
        $empleado = Empleado::find($request->get('id'));

        $empleado->update([
            'sucursal_id'           => $request->get('sucursal_id'),
            'em_nombre'             => strtoupper($request->get('em_nombre')),
            'em_apellido_paterno'   => strtoupper($request->get('em_apellido_paterno')),
            'em_apellido_materno'   => strtoupper($request->get('em_apellido_materno')),
            'em_fecha_nacimiento'   => $request->get('em_fecha_nacimiento'),
            'em_nss'                => strtoupper($request->get('em_nss')),
            'em_curp'               => strtoupper($request->get('em_curp')),
            'em_telefono'           => $request->get('em_telefono'),
            'em_cargo'              => strtoupper($request->get('em_cargo')),
            'em_fecha_antiguedad'   => $request->get('em_fecha_antiguedad'),
            'em_contacto_emergencia'=> $request->get('em_contacto_emergencia')
        ]);

        //---
        $usuario = User::find($empleado->user_id);
        $usuario->rol_id   = $request->rol_id;
        $usuario->save();
        //---

        if( $request->hasFile('acta_nacimiento_file') ){
    		
            $file = $request->file('acta_nacimiento_file');
            
            $destinationPath = storage_path()."/app/docs/".$request->get('id')."/"; // upload path
    		
            $fileName = $request->file('acta_nacimiento_file')->getClientOriginalName();
            $extension = $request->file('acta_nacimiento_file')->extension();
           
    		$uploadSuccess = $file->move($destinationPath, $fileName); // uploading file to given path
    		
            $shortPath = "app/docs/".$request->get('id')."/".$fileName;

    		if($uploadSuccess){
                $empleado->em_path_acta = $shortPath;
                $empleado->save();
    		}
    	}

        if( $request->hasFile('ine_file') ){
    		
            $file = $request->file('ine_file');
            
            $destinationPath = storage_path()."/app/docs/".$request->get('id')."/"; // upload path
    		
            $fileName = $request->file('ine_file')->getClientOriginalName();
            $extension = $request->file('ine_file')->extension();
           
    		$uploadSuccess = $file->move($destinationPath, $fileName); // uploading file to given path
    		
            $shortPath = "app/docs/".$request->get('id')."/".$fileName;

    		if($uploadSuccess){
                $empleado->em_path_ine = $shortPath;
                $empleado->save();
    		}
    	}

        if( $request->hasFile('curp_file') ){
    		
            $file = $request->file('curp_file');
            
            $destinationPath = storage_path()."/app/docs/".$request->get('id')."/"; // upload path
    		
            $fileName = $request->file('curp_file')->getClientOriginalName();
            $extension = $request->file('curp_file')->extension();
           
    		$uploadSuccess = $file->move($destinationPath, $fileName); // uploading file to given path
    		
            $shortPath = "app/docs/".$request->get('id')."/".$fileName;

    		if($uploadSuccess){
                $empleado->em_path_curp = $shortPath;
                $empleado->save();
    		}
    	}

        if( $request->hasFile('comprobante_file') ){
    		
            $file = $request->file('comprobante_file');
            
            $destinationPath = storage_path()."/app/docs/".$request->get('id')."/"; // upload path
    		
            $fileName = $request->file('comprobante_file')->getClientOriginalName();
            $extension = $request->file('comprobante_file')->extension();
           
    		$uploadSuccess = $file->move($destinationPath, $fileName); // uploading file to given path
    		
            $shortPath = "app/docs/".$request->get('id')."/".$fileName;

    		if($uploadSuccess){
                $empleado->em_path_comprobante_dom = $shortPath;
                $empleado->save();
    		}
    	}

        if( $request->hasFile('contrato_file') ){
    		
            $file = $request->file('contrato_file');
            
            $destinationPath = storage_path()."/app/docs/".$request->get('id')."/"; // upload path
    		
            $fileName = $request->file('contrato_file')->getClientOriginalName();
            $extension = $request->file('contrato_file')->extension();
           
    		$uploadSuccess = $file->move($destinationPath, $fileName); // uploading file to given path
    		
            $shortPath = "app/docs/".$request->get('id')."/".$fileName;

    		if($uploadSuccess){
                $empleado->em_path_contrato = $shortPath;
                $empleado->save();
    		}
    	}


        return [
            'returnCode'    => '200',
            'msg'           => 'Empleado actualizado'
        ];
    }

    public function updateAPI(Request $request)
    {
        $empleado = Empleado::find($request->get('empleado_id'));   

        $type = $request->get('type');

        //Recibe archivo
        $file = $request->file('file');
            
        $destinationPath = storage_path()."/app/docs/".$request->get('empleado_id')."/"; // upload path
        
        $fileName = $request->file('file')->getClientOriginalName();
        $extension = $request->file('file')->extension();
       
        $uploadSuccess = $file->move($destinationPath, $fileName); // uploading file to given path
        
        $shortPath = "app/docs/".$request->get('empleado_id')."/".$fileName;

        if($uploadSuccess){
            
            switch($type)
            {
                case 'ACTA':
                    $empleado->em_path_acta = $shortPath;
                    break;
                case 'INE':
                    $empleado->em_path_ine = $shortPath;
                    break;
                case 'CURP':
                    $empleado->em_path_curp = $shortPath;
                    break;
                case 'COMPROBANTE_DOM':
                    $empleado->em_path_comprobante_dom = $shortPath;
                    break;
                case 'CONTRATO':
                    $empleado->em_path_contrato = $shortPath;
                    break;
            }
            
            $empleado->save();

            return response()->json([
                'status'    => 'ok',
                'empleado'  => $empleado
                ], 200
            );
        }    
    		
        return response()->json([
            'status'    => 'Ocurrió un error',
            ], 400
        );
    	
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

        $empleado = Empleado::with(['sucursal','user'])->find($empleado_id);

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

    public function destroyFile($id,$type)
    {
        $empleado = Empleado::find($id);

        switch($type)
        {
            case 'ACTA':
                $empleado->em_path_acta = null;
                break;

            case 'INE':
                $empleado->em_path_ine = null;
                break;
            
            case 'CURP':
                $empleado->em_path_curp = null;
                break;

            case 'COMPROBANTE_DOM':
                $empleado->em_path_comprobante_dom = null; 
                break;

            case 'CONTRATO':
                $empleado->em_path_contrato = null;
                break;
        }

        $empleado->save();

        return [
            'returnCode'    => '200',
            'msg'           => 'Archivo eliminado'
        ];
    }

    public function downloadFile($id,$type)
    {
        $empleado = Empleado::find($id);

        switch($type)
        {
            case 'ACTA':
                $path = $empleado->em_path_acta;
                break;

            case 'INE':
                $path = $empleado->em_path_ine;
                break;
            
            case 'CURP':
                $path = $empleado->em_path_curp;
                break;

            case 'COMPROBANTE_DOM':
                $path = $empleado->em_path_comprobante_dom;
                break;

            case 'CONTRATO':
                $path = $empleado->em_path_contrato;
                break;
        }

        $url = storage_path($path);

        $filename = pathinfo($url,PATHINFO_FILENAME);

        return response()->download($url);
    }
}
