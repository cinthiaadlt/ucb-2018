<?php

namespace App\Http\Controllers;
use App\Role;
use Illuminate\Http\Request;

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
        'nombre_rol'=>'required',
        'descripcion_rol'=>'required'
      ]);
      $t_role = new Role;
      $t_role->nombre_rol = $request->input('nombre_rol');
      $t_role->descripcion_rol = $request->input('descripcion_rol');
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
        'nombre_rol'=>'required',
        'descripcion_rol'=>'required',
      ]);
      $t_role = Role::find ($id);
      $t_role->nombre_rol = $request->input('nombre_rol');
      $t_role->descripcion_rol = $request->input('descripcion_rol');
      $t_role-> save ();
      return redirect ('/roles');
    }

    public function destroy($id) {
        Role::where('id_roles', $id)->delete ();
        return redirect ('/roles');
    }
}
