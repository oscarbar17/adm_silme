<?php

namespace App\Http\Controllers;

use App\Exports\MarcasExport;
use App\Models\Marca;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Excel;

class MarcasController extends Controller
{
    //
    public function index()
    {
        return view('marcas.marcas_index');
    }

    public function indexDT(Request $request)
    {
        $marcas = Marca::where([
            'ma_eliminado'  => false
        ])->get();

        return DataTables::of($marcas)
                ->addColumn('opciones',function($row){
                    return '<div class="btn-list">
                            <div class="dropdown">
                                <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-cog"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item btn-action-modal" href="'.route('marcas.edit',[$row->id]).'"
                                            data-toggle="modal" data-target="#modal-medium"
                                    >Editar</a>
                                    <a class="dropdown-item btn-destroy-marcas" href="'.route('marcas.destroy',[$row->id]).'">Eliminar</a>
                                </div>
                            </div>';
                })
                ->rawColumns(['opciones'])
                ->make(true);
    }

    public function create()
    {
        return view('marcas.marcas_create');
    }

    public function store(Request $request)
    {
        $marca = Marca::create([
            'ma_nombre'     => strtoupper($request->get('ma_nombre')),
            'ma_producto'   => strtoupper($request->get('ma_producto')),
            'ma_contacto'   => strtoupper($request->get('ma_contacto')),
            'ma_telefono'   => $request->get('ma_telefono'),
            'ma_correo'   => strtoupper($request->get('ma_correo'))
        ]);

        return [
            'returnCode'    => '200',
            'msg'           => 'Marca Guardada'
        ];
    }

    public function edit($id)
    {
        $marca = Marca::find($id);

        return view('marcas.marcas_edit',[
            'marca' => $marca
        ]);
    }

    public function update(Request $request)
    {
        $marca = Marca::findOrFail($request->get('id'))->update([
            'ma_nombre'     => strtoupper($request->get('ma_nombre')),
            'ma_producto'   => strtoupper($request->get('ma_producto')),
            'ma_contacto'   => strtoupper($request->get('ma_contacto')),
            'ma_telefono'   => $request->get('ma_telefono'),
            'ma_correo'   => strtoupper($request->get('ma_correo'))
        ]);

        return [
            'returnCode'    => '200',
            'msg'           => 'Marca Actualizada'
        ];
    }

    public function destroy($id)
    {
        $marca = Marca::findOrFail($id);
        $marca->ma_eliminado = true;
        $marca->save();

        return [
            'returnCode'    => '200',
            'msg'           => 'Marca Eliminada'
        ];
    }

    public function export() 
    {
        return Excel::download(new MarcasExport, 'Marcas.xlsx');
    }

}
