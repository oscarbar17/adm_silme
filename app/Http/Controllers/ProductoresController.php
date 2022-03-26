<?php

namespace App\Http\Controllers;

use App\Exports\ProductoresExport;
use App\Models\Municipio;
use App\Models\Producto;
use App\Models\Productor;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Excel;

class ProductoresController extends Controller
{
    //
    public function index()
    {
        return view('productores.productores_index');
    }

    public function indexDT(Request $request)
    {
        $productores = Productor::where([
            'pr_eliminado'  => false
        ])->with(['producto','municipio'])->get();

        return DataTables::of($productores)
                ->addColumn('opciones',function($row){
                    return '<div class="btn-list">
                            <div class="dropdown">
                                <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-cog"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item btn-action-modal" href="'.route('productores.edit',[$row->id]).'"
                                            data-toggle="modal" data-target="#modal-medium"
                                    >Editar</a>
                                    <a class="dropdown-item btn-destroy-productores" href="'.route('productores.destroy',[$row->id]).'">Eliminar</a>
                                </div>
                            </div>';
                })
                ->rawColumns(['opciones'])
                ->make(true);
    }

    public function create()
    {
        $productos = Producto::where([
            'pr_eliminado'  => false
        ])->orderBy('pr_nombre','asc')->get();

        $municipios = Municipio::orderBy('mu_nombre','asc')->get();

        return view('productores.productores_create',[
            'productos' => $productos,
            'municipios'=> $municipios
        ]);
    }

    public function store(Request $request)
    {
        $productor = Productor::create([
            'producto_id'   => $request->get('producto_id'),
            'pr_nombre'     => $request->get('pr_nombre'),
            'pr_cultivo'    => $request->get('pr_cultivo'),
            'pr_correo'     => $request->get('pr_correo'),
            'pr_telefono'   => $request->get('pr_telefono'),
            'municipio_id'  => $request->get('municipio_id')
        ]);

        return [
            'returnCode'    => '200',
            'msg'           => 'Productor guardado'
        ];
    }

    public function storeApi(Request $request)
    {
        $productor = Productor::create([
            'producto_id'   => $request->get('producto_id'),
            'pr_nombre'     => $request->get('pr_nombre'),
            'pr_cultivo'    => $request->get('pr_cultivo'),
            'pr_correo'     => $request->get('pr_correo'),
            'pr_telefono'   => $request->get('pr_telefono'),
            'municipio_id'  => $request->get('municipio_id')
        ]);

        return response()->json([
            'status'    => 'Productor registrado'
            ], 200
        );
    }

    public function edit($id)
    {
        $productor = Productor::find($id);
        
        $productos = Producto::where([
            'pr_eliminado'  => false
        ])->orderBy('pr_nombre','asc')->get();

        $municipios = Municipio::orderBy('mu_nombre','asc')->get();

        return view('productores.productores_edit',[
            'productor' => $productor  ,
            'productos' => $productos , 
            'municipios'=> $municipios
        ]);
    }

    public function update(Request $request)
    {
        $productor = Productor::findOrFail($request->get('id'));
        $productor->producto_id = $request->get('producto_id');
        $productor->pr_nombre   = $request->get('pr_nombre');
        $productor->pr_cultivo  = $request->get('pr_cultivo');
        $productor->pr_correo   = $request->get('pr_correo');
        $productor->pr_telefono = $request->get('pr_telefono');
        $productor->municipio_id= $request->get('municipio_id');
        $productor->save();

        return [
            'returnCode'    => '200',
            'msg'           => 'Productor actualizado'
        ];
    }

    public function destroy($id)
    {
        $productor = Productor::findOrFail($id);
        $productor->pr_eliminado    = true;
        $productor->save();

        return [
            'returnCode'    => '200',
            'msg'           => 'Productor Eliminado'
        ];
    }

    public function export() 
    {
        return Excel::download(new ProductoresExport, 'Productores.xlsx');
    }
}
