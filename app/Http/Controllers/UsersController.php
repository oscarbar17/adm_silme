<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Yajra\DataTables\Facades\DataTables;

class UsersController extends Controller
{
    //
    public function index()
    {
        return view('usuarios.usuarios_index');
    }

    public function indexDT()
    {
        $users = User::with('rol')->get();

        return DataTables::of($users)
            ->addColumn('opciones',function($row){
                return '<div class="btn-list">
                        <div class="dropdown">
                            <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-cog"></i>
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item btn-action-modal" href="'.route('usuarios.edit_password',[$row->id]).'"
                                        data-toggle="modal" data-target="#modal-large" >Cambiar Contraseña</a>
                            </div>
                        </div>';
            })
            ->rawColumns(['opciones'])
            ->make(true);

    }

    public function editPassword($id)
    {
        $user = User::find($id);

        return view('usuarios.usuarios_edit_password',[
            'usuario'   => $user
        ]);
    }

    public function updatePassword(Request $request)
    {
        $user = User::find($request->id);
        $user->password = bcrypt($request->new_password);
        $user->save();

        
        $emailData = [
            'email'        => $user->email,
            'password'     => $request->new_password,
            'login'        => route('login.create')
        ];

        Mail::send ( 'emails.email_cambio_contrasena', $emailData, function ($message) use ($emailData) {
            $message->to ( $emailData['email'] );
                
            $message->from ( env('MAIL_FROM_ADDRESS') , env('MAIL_FROM_NAME') );
            $message->subject ( __('Nueva contraseña de acceso') );
            
        } );


        return [
            'returnCode'    => '200',
            'msg'           => 'Contraseña actualizada'
        ];
    }
}
