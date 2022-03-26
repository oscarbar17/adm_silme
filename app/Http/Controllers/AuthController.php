<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use App\Models\Modulo;
use App\Models\ModuloRol;
use App\Models\Rol;
use App\Models\User;
use Carbon\Carbon;

class AuthController extends Controller
{
    public function create()
    {
        return view('login');
    }
    
    public function store(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required'
        ]);
        
        $usuario = User::where([
            'email' => $request->get('email')
        ])->where('estatus','!=','ELIMINADO')->where('rol_id','1')->with(['rol'])->first();
        
        if(is_null($usuario)){
            return redirect()->route('login.create',$request->get('email'))
            ->withErrors('¡Lo Sentimos! Tu cuenta está suspendida o no existe.');
        }
        
        if($usuario && $usuario->estatus == 'BLOQUEADO'){
            $bloqHasta = Carbon::parse($usuario->bloqueado_hasta);
            $now = Carbon::now();
            if($now->lessThan($bloqHasta)){
                $mins = $now->diffInMinutes($bloqHasta);
                if($mins > 0){
                    return redirect()->route('login.create',$request->get('email'))
                    ->withErrors('Usuario Bloqueado. Reintenta en 15 minutos.');
                }
            }
        }
        
        $authOK = auth()->attempt($request->only(['email','password']));
        
        if(!$authOK){
            $usuario = User::where(['email' => $request->get('email')])->first();
            
            if(!is_null($usuario)){
                
                if($usuario->intentos_login == 10){
                    $usuario->estatus 			= "BLOQUEADO";
                    $usuario->bloqueado_hasta	= Carbon::now()->addMinutes(15);
                    $usuario->save();
                    
                    if($request->get('bloqueo')){
                        return redirect()->route('login.create',$request->get('email'))
                        ->withErrors('Usuario Bloqueado. Intenta en 15 minutos.');
                    }
                    return redirect()->route('login.create',$request->get('email'))
                    ->withErrors('Usuario Bloqueado. Intenta en 15 minutos.');
                    
                }else if($usuario->estatus == 'BLOQUEADO'){
                    $usuario->bloqueado_hasta	= Carbon::now()->addMinutes(15);
                    $usuario->save();
                    if($request->get('bloqueo')){
                        return redirect()->route('login.create',$request->get('email'))
                        ->withErrors('Usuario Bloqueado. Intenta en 15 minutos.');
                    }
                    return redirect()->route('login.create',$request->get('email'))
                    ->withErrors('Usuario Bloqueado. Intenta en 15 minutos.');
                    
                }
            }else{
                return redirect()->route('login.create',$request->get('email'))
                ->withErrors('¡Lo Sentimos! Tus datos de acceso son incorrectos.');
                
            }
            if($request->get('bloqueo')){
                return redirect()->route('login.create',$request->get('email'))
                ->withErrors('¡Lo Sentimos! Tus datos de acceso son incorrectos.');
                
            }
            
            return redirect()->route('login.create',$request->get('email'))
            ->withErrors('¡Lo Sentimos! Tus datos de acceso son incorrectos, cuentas con 0 intentos');
            
        }
        
        if($usuario->estatus == 'ACTIVO' || $usuario->estatus == 'BLOQUEADO'){
            // PROABMOS QUE EL USAURIO PERTENEZCA AL PORTAL
            
            $modulosRol = ModuloRol::where([
                'rol_id'	=> $usuario->rol_id,
                'ms_habilitado'     => true
                
            ])->pluck('modulo_id');
            
            Log::info($modulosRol);
            
            $modsPermitidos = ModuloRol::where([
                'rol_id'	=> $usuario->rol_id,
                'ms_habilitado'     => true
            ])->pluck('modulo_id');
            
            $acl = ModuloRol::where([
                'rol_id'	=> $usuario->rol_id,
                'ms_habilitado'     => true
            ])->with(['modulo'])->get();
            
            Log::info('--- modulos permitidos ---');
            Log::info($modsPermitidos);
            
            $modulos = Modulo::with ( 'hijos' )
            ->whereIn('id',$modulosRol)
            ->where ( [
                'parent_id' 	=> null,
                'mo_publicado'	=> true
            ] )
            ->whereHas('hijos', function($q) use ($modsPermitidos){
                $q->whereIn('id',$modsPermitidos);
            })
            ->orderBy ( 'mo_orden' )->get ();
            
            Log::info('Get rol...');
            $rol = Rol::findOrFail ( $usuario->rol_id );
            
            Log::info('Set session');
            
            session ( [
                'modulos' => $modulos
            ] );
            // almacena user id, home resource, username y rol
            
            session ( [
                'username' => $usuario->username,
                'home' => $rol->ro_ruta_home,
                'user_id' => $usuario->id,
                'rol' => $usuario->rol_id,
                'usuario'	=> $usuario,
                'modulosPermitidos'	=> $modsPermitidos,
                'acl' => $acl,
                'user'	=> $usuario,
            ] );
            
            Log::info('--- MODULOS PEMITIDOS -------------');
            Log::info(json_encode($modsPermitidos));
            Log::info(' ----------- ');
            Log::info('--- ACL ---------------------------');
            Log::info(json_encode($acl));
            Log::info(' ----------- ');
            
            
            Log::info ( 'Inicio de sesion' . $usuario->email . ' - ' . $rol->ro_ruta_home.' rol: '.$rol->ro_descripcion.' '.$rol->id );
            
            
            Log::info('redirect');
            return redirect()->route($rol->ro_ruta_home);
  
        }else{
            //cuando es ELIMINADO   
            Log::info("Estatus: ".$usuario->estatus);
            
            auth()->logout();
            Session::flush();
            return redirect()->route('login.create',$request->get('email'))
            ->withErrors('¡Lo Sentimos! Tu cuenta está suspendida.');
        }
    }

    public function storeApi(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required'
        ]);

        $usuario = User::where([
            'email' => $request->get('email')
        ])->where('estatus','!=','ELIMINADO')->with(['rol'])->first();
        
        if(is_null($usuario)){
            return response()->json([
                'status' => 'La cuenta no existe'], 400
            );
        }

        $authOK = auth()->attempt($request->only(['email','password']));
        
        if(!$authOK){
            return response()->json([
                'status' => 'Credenciales inválidas'], 400
            );
        }

        $empleado = Empleado::where([
            'user_id'   => $usuario->id
        ])->with(['sucursal'])->first();

        return response()->json([
            'status'    => 'ok',
            'empleado'  => $empleado
            ], 200
        );
    }
    
    
    public function destroy()
    {
        auth()->logout();
        Session::flush();
        
        return redirect()->route('login.create');
    }
}
