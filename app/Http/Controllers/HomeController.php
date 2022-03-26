<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    //
    public function indexAdmin()
    {
        $eventos = Evento::take(6)->orderBy('id','desc')->with([
            'empleado', 'sucursal','producto'
        ])->get();

        $topMarcas = Evento::select(['marca_id',DB::raw('count(*) as total')])
                        ->groupBy('marca_id')
                        ->orderBy('total','desc')
                        ->take(5)
                        ->get();

        return view('home.home_admin',[
            'eventos'   => $eventos,
            'topMarcas' => $topMarcas
        ]);
    }
}
