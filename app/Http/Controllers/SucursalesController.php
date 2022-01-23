<?php

namespace App\Http\Controllers;

use App\Models\Sucursal;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

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
            //'pr_eliminado'  => false
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
                                    <a class="dropdown-item" href="javascript:void(0)">Eliminar</a>
                                </div>
                            </div>';
                })
                ->rawColumns(['opciones'])
                ->make(true);
    }

    public function create()
    {
        return view('sucursales.sucursales_create');
    }

    public function store(Request $request)
    {
        $sucursal = Sucursal::create([
            'su_nombre'         => $request->get('su_nombre'), 
            'su_encargado'      => $request->get('su_encargado'),
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

        return view('sucursales.sucursales_edit',[
            'sucursal'  => $sucursal
        ]);
    }

    public function update()
    {

    }

    public function destroy()
    {
        
    }
}
