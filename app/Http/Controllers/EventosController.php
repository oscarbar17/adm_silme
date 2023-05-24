<?php

namespace App\Http\Controllers;

use App\Exports\EventosExport;
use App\Models\Empleado;
use App\Models\Evento;
use App\Models\EventoImagen;
use App\Models\Municipio;
use App\Models\Producto;
use App\Models\Sucursal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;
use Yajra\DataTables\Facades\DataTables;
use Excel;

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
        ->orderBy('nombre','asc')
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
                    ]);

        if($request->sucursal_id != ""){
            $eventos = $eventos->where('sucursal_id',$request->sucursal_id);
        }

        if($request->empleado_id != ""){
            $eventos = $eventos->where('empleado_id',$request->empleado_id);
        }

        if($request->producto_id != ""){
            $eventos = $eventos->where('producto_id',$request->producto_id);
        }

        if($request->municipio_id != ""){
            $eventos = $eventos->where('municipio_id',$request->municipio_id);
        }

        if($request->tipo_evento != ""){
            $eventos = $eventos->where('ev_tipo_evento',$request->tipo_evento);
        }

        if($request->estatus != ""){
            $eventos = $eventos->where('ev_estatus',$request->estatus);
        }

        if($request->fecha_inicio != ""){
            //$eventos = $eventos->where('created_at','>=',$request->fecha_inicio);
            $eventos = $eventos->where('created_at','>=',$request->fecha_inicio . "00:00" );
        }

        if($request->fecha_fin != ""){
            //$eventos = $eventos->where('created_at','<=',$request->fecha_fin);
            $eventos = $eventos->where('created_at','<=',$request->fecha_fin . "23:59" );
        }

        $eventos = $eventos->get();

        return DataTables::of($eventos)
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
                                    <a class="dropdown-item" href="'.route('events.show',[$row->id]).'"
                                            >Detalles del Evento</a>
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
            'ev_tipo_cultivo'=> strtoupper($request->get('ev_tipo_cultivo')),
            'ev_latitud'    => $request->get('ev_latitud'),
            'ev_longitud'   => $request->get('ev_longitud'),
            'ev_notas'      => strtoupper($request->get('ev_notas')),
            'ev_tipo_evento'=> strtoupper($request->get('ev_tipo_evento')),
            'sucursal_id'   => $request->get('sucursal_id')
        ]);

        
        return response()->json([
            'status'    => 'Evento registrado',
            'evento'    => $evento
            ], 200
        );
    }

    public function show($id)
    {
        $evento = Evento::with(['empleado','productor','municipio','imagenes'])->find($id);

        return view('eventos.eventos_show',[
            'evento'    => $evento
        ]);
        
    }

    public function getEventoApi(Request $request)
    {
        $evento = Evento::with(['sucursal','empleado','productor','municipio','marca','producto','imagenes'])->findOrFail($request->get('evento_id'));

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
                            ->with(['productor','marca'])
                            ->get();

        return response()->json([
            'status'    => 'ok',
            'eventos'   => $eventos
            ], 200
        );
    }

    public function updateApi(Request $request)
    {
        $evento = Evento::find($request->get('evento_id'));

        $evento->ev_notas   = strtoupper($request->get('ev_notas'));
        $evento->ev_estatus = strtoupper($request->get('ev_estatus'));
        $evento->save();

        //Recibe imagenes
        if( $request->hasFile('files') ){

            Log::info("trae archivos");

            $files = $request->file('files');

            Log::info($files);
    		
            foreach($request->file('files') as $file){

                Log::info("In foreach...");

                #$file = $request->file('file');
                
                $destinationPath = public_path()."/storage/eventos/".$request->get('evento_id')."/"; // upload path
                
                $fileName = $file->getClientOriginalName();
                $extension = $file->extension();
            
                if(!is_dir($destinationPath)) mkdir($destinationPath, 0755, true);


                $uploadSuccess = $file->move($destinationPath, $fileName); // uploading file to given path
                
                $shortPath = "storage/eventos/".$request->get('evento_id')."/".$fileName;

                Log::info("ShortPath");

                if($uploadSuccess){
                    $eventoImagen = EventoImagen::create([
                        'evento_id'     => $evento->id,
                        'ei_path_imagen'=> $shortPath
                    ]);
                    
                }
            }
    	}else{
            Log::info("No vienen archivos");
        }


        return response()->json([
            'status'    => 'ok',
            'eventos'   => $evento
            ], 200
        );
    }

    public function export(Request $request) 
    {
        return Excel::download(new EventosExport($request->sucursal_id,$request->empleado_id,$request->cultivo_id,$request->municipio_id,$request->tipo_evento,$request->estatus,$request->fecha_inicio,$request->fecha_fin), 'Eventos.xlsx');
    }
    
}
