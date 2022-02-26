<?php

namespace App\Http\Controllers;

use App\Models\Marca;
use App\Models\Municipio;
use App\Models\Producto;
use App\Models\Productor;
use Illuminate\Http\Request;

class APIController extends Controller
{
    //
    public function getAPIData()
    {
        $municipios = Municipio::get();

        $marcas = Marca::where([
            'ma_eliminado'  => false
        ])->get();

        $cultivos = Producto::where([
            'pr_eliminado'  => false
        ])->get();

        $productores = Productor::where([
            'pr_eliminado'  => false
        ])->get();

        return response()->json([
            'status'    => 'ok',
            'municipios'=> $municipios,
            'marcas'    => $marcas,
            'cultivos'  => $cultivos,
            'productores'=> $productores
            ], 200
        );
    }
}
