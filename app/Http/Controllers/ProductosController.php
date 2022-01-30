<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ProductosController extends Controller
{
    //
    public function index()
    {
        return view('productos.productos_index');
    }

    public function indexDT(Request $request)
    {
        $marcas = Producto::where([
            'pr_eliminado'  => false
        ])->get();

        return DataTables::of($marcas)  
                ->addColumn('opciones',function($row){
                    return '<div class="btn-list">
                            <div class="dropdown">
                                <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-cog"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item btn-action-modal" href="'.route('productos.edit',[$row->id]).'"
                                            data-toggle="modal" data-target="#modal-medium"
                                    >Editar</a>
                                    <a class="dropdown-item btn-destroy-productos" href="'.route('productos.destroy',[$row->id]).'">Eliminar</a>
                                </div>
                            </div>';
                })
                ->rawColumns(['opciones'])
                ->make(true);
    }

    public function create()
    {
        return view('productos.productos_create');
    }

    public function store(Request $request)
    {
        $producto = Producto::create([
            'pr_nombre' => $request->get('pr_nombre')
        ]);

        return [
            'returnCode'    => '200',
            'msg'           => 'Producto guardado'
        ];
    }

    public function edit($id)
    {
        $producto = Producto::find($id);

        return view('productos.productos_edit',[
            'producto'  => $producto
        ]);
    }

    public function update(Request $request)
    {
        $producto = Producto::findOrFail($request->get('id'))->update([
            'pr_nombre' => $request->get('pr_nombre')
        ]);

        return [
            'returnCode'    => '200',
            'msg'           => 'Producto actualizado'
        ];
    }

    public function destroy($id)
    {
        $producto = Producto::findOrFail($id);
        $producto->pr_eliminado = true;
        $producto->save();
        
        return [
            'returnCode'    => '200',
            'msg'           => 'Producto eliminado'
        ];
    }
}
