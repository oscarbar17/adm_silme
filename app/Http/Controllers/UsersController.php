<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
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
        $user->password = bcrypt('new_password');
        $user->save();

        return [
            'returnCode'    => '200',
            'msg'           => 'Contraseña actualizada'
        ];
    }
}
