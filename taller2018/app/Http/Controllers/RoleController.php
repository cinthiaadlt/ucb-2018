<?php

namespace App\Http\Controllers;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class RoleController extends Controller {
    public function index() {
        $roles = Role::all ();
        return view ('roles.index', compact ('roles'));
    }

    public function create() {
      return view ('roles.create');
    }

    public function store(Request $request) {
      $this->validate($request,[
        'nombre_role'=>'required|alpha|max:20',
        'descripcion_role'=>'required|alpha_spaces|max:250'
      ]);
      $t_role = new Role;
      $t_role->nombre_role = $request->input('nombre_rol');
      $t_role->descripcion_role = $request->input('descripcion_rol');
      $t_role-> save ();
      return redirect ('/roles');
    }

    public function show($id) {
        $role = Role::findOrFail($id);
        return view ('roles.show', compact ('role'));
    }

    public function edit($id) {
        $role = Role::findOrFail ($id);
        return view ('roles.edit', compact ('role'));
    }

    public function update(Request $request, $id) {
      $this->validate($request,[
        'nombre_role'=>'required',
        'descripcion_role'=>'required',
      ]);
      $t_role = Role::find ($id);
      $t_role->nombre_role = $request->input('nombre_role');
      $t_role->descripcion_role = $request->input('descripcion_role');
      $t_role-> save ();
      return redirect ('/roles');
    }

    public function destroy($id) {
        Role::where('id_roles', $id)->delete ();
        return redirect ('/roles');
    }
}
