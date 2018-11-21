<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index () {
      // Auth::user ()->setMyRoleToAdmin ();
    }

    public function create() {
        return view('usuario.create');
    }

    public function store(Request $request) {
        $usuario= new \App\Usuario;
        $usuario->primer_nombre=$request->get('primer_nombre');
        $usuario->primer_apellido=$request->get('primer_apellido');
        $usuario->nombre_usuario=$request->get('nombre_usuario');
        $usuario->password=$request->get('password');
        $usuario->nacionalidad=$request->get('nacionalidad');
        $usuario->save();

        return redirect('usuarios')->with('success', 'Information has been added');
    }

    public function show($id) {
        //
    }

    public function edit($id) {
        //
        $usuario = \App\Usuario::find($id);
        return view('usuario.edit',compact('usuario','id'));
    }

    public function update(Request $request, $id) {
        //
        $usuario= \App\Usuario::find($id);
        $usuario->primer_nombre=$request->get('primer_nombre');
        $usuario->primer_apellido=$request->get('primer_apellido');
        $usuario->nombre_usuario=$request->get('nombre_usuario');
        $usuario->password=$request->get('password');
        $usuario->nacionalidad=$request->get('nacionalidad');
        $usuario->save();
        return redirect('usuarios');
    }

    public function destroy($id) {
        //
        $usuario = \App\Usuario::find($id);
        $usuario->delete();
        return redirect('usuarios')->with('success','Information has been  deleted');
    }
}
