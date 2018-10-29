<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $usuarios=\App\Usuario::paginate(10);
        //$usuarios = DB::table('usuarios')->simplePaginate(3);
        return view('usuario.index',compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('usuario.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $usuario= new \App\Usuario;
        $usuario->primer_nombre=$request->get('primer_nombre');
        $usuario->primer_apellido=$request->get('primer_apellido');
        $usuario->nombre_usuario=$request->get('nombre_usuario');
        $usuario->password=$request->get('password');
        $usuario->nacionalidad=$request->get('nacionalidad');
        $usuario->save();
        
        return redirect('usuarios')->with('success', 'Information has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $usuario = \App\Usuario::find($id);
        return view('usuario.edit',compact('usuario','id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $passport = \App\Usuario::find($id);
        $passport->delete();
        return redirect('usuarios')->with('success','Information has been  deleted');
    }
}
