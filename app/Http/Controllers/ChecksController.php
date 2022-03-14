<?php

namespace App\Http\Controllers;

use App\Models\Check;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class ChecksController extends Controller
{
    //
    public function storeApi(Request $request)
    {
        
        $validated = $request->validate($request, [
            'empleado_id' => 'required',
            'sucursal_id' => 'required'
        ]);
        
        
        $check = Check::create([
            'empleado_id'           => $request->get('empleado_id'),
            'sucursal_id'           => $request->get('sucursal_id'),
            'ch_check_in'           => $request->get('ch_check_in'),
            'ch_photo_check_in'     => $request->get('ch_photo_check_in'),
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
        $check->update([
            'ch_check_out'      => $request->get('ch_check_out'),
            'ch_photo_check_out'=> $request->get('ch_photo_check_out'),
            'ch_latitud_check_out'=> $request->get('ch_latitud_check_out'),
            'ch_longitud_check_out'=> $request->get('ch_longitud_check_out')
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
}
