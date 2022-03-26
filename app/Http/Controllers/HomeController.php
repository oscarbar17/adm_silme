<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function indexAdmin()
    {
        $eventos = Evento::take(6)->orderBy('id','desc')->with([
            'empleado', 'sucursal','producto'
        ])->get();

        return view('home.home_admin',[
            'eventos'   => $eventos
        ]);
    }
}
