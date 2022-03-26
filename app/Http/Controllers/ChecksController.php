<?php

namespace App\Http\Controllers;

use App\Models\Check;
use App\Models\Empleado;
use App\Models\Sucursal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redis;
use Yajra\DataTables\Facades\DataTables;

class ChecksController extends Controller
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

        return view('checks.checks_index',[
            'sucursales'    => $sucursales,
            'empleados'     => $empleados
        ]);
    }

    public function indexDT(Request $request)
    {
        $checks = Check::with(['empleado','sucursal']);
        
        if($request->sucursal_id != ""){
            $checks = $checks->where('sucursal_id',$request->sucursal_id);
        }

        if($request->empleado_id != ""){
            $checks = $checks->where('empleado_id',$request->empleado_id);
        }

        $checks = $checks->get();

        return DataTables::of($checks)
                ->addColumn('empleado',function($row){
                    return $row->empleado->em_nombre . ' ' . $row->empleado->em_apellido_paterno;
                })
                ->addColumn('opciones',function($row){
                    return '<div class="btn-list">
                            <div class="dropdown">
                                <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-cog"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="'.route('checks.show',[$row->id]).'"
                                            >Detalles del Check</a>
                                </div>
                            </div>';
                })
                ->rawColumns(['opciones'])
                ->make(true);
    }

    public function show($id)
    {
        $check = Check::with(['empleado','sucursal'])->find($id);

        return view('checks.checks_show',[
            'check'    => $check
        ]);
        
    }

    public function storeApi(Request $request)
    {
        Log::info("ChecksController@storeApi");
        /*
        $validated = $request->validate($request, [
            'empleado_id' => 'required',
            'sucursal_id' => 'required'
        ]);
        */
        $file = $request->file('ch_photo_check_in');
        $destinationPath = public_path()."/storage/checks/".$request->get('empleado_id')."/"; // upload path
        
        $fileName = $file->getClientOriginalName();
        $extension = $file->extension();
        $uploadSuccess = $file->move($destinationPath, $fileName); // uploading file to given path
        $shortPath = "storage/checks/".$request->get('empleado_id')."/".$fileName;

        $check = Check::create([
            'empleado_id'           => $request->get('empleado_id'),
            'sucursal_id'           => $request->get('sucursal_id'),
            'ch_check_in'           => $request->get('ch_check_in'),
            'ch_photo_check_in'     => $shortPath,
            'ch_latitud_check_in'   => $request->get('ch_latitud_check_in'),
            'ch_longitud_check_in'  => $request->get('ch_longitud_check_in')
        ]);
        
        return response()->json([
            'status'    => 'Evento registrado',
            'evento'    => $check
            ], 200
        );
        
    }

    public function updateApi(Request $request)
    {
        $check = Check::find($request->get('check_id'));

        $file = $request->file('ch_photo_check_out');
        
        $destinationPath = public_path()."/storage/checks/".$request->get('empleado_id')."/"; // upload path
        
        $fileName = $file->getClientOriginalName();
        $extension = $file->extension();
        $uploadSuccess = $file->move($destinationPath, $fileName); // uploading file to given path
        $shortPath = "storage/checks/".$request->get('empleado_id')."/".$fileName;

        $check->update([
            'ch_check_out'      => $request->get('ch_check_out'),
            'ch_photo_check_out'=> $shortPath,
            'ch_latitud_check_out'=> $request->get('ch_latitud_check_out'),
            'ch_longitud_check_out'=> $request->get('ch_longitud_check_out'),
            'ch_estatus'        => 'CERRADO'
        ]);

        return response()->json([
            'status'    => 'Evento actualizado',
            'evento'    => $check
            ], 200
        );
        /*
        'empleado_id','sucursal_id','ch_check_in','ch_check_out','ch_photo_check_in','ch_photo_check_out',
        'ch_latitud_check_in','ch_longitud_check_in','ch_latitud_check_out','ch_longitud_check_out'
        */
    }

    public function getLastActiveCheck(Request $request)
    {
        $check = Check::where([
            'empleado_id'   => $request->get('empleado_id'),
            'ch_estatus'    => 'ABIERTO'
        ])->orderBy('id','desc')->first();

        if(is_null($check)){
            return response()->json([
                'status'    => 'Sin eventos activos'
                ], 400
            );    
        }

        return response()->json([
            'status'    => 'Evento activo',
            'evento'    => $check
            ], 200
        );
    }
}
