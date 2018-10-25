<?php

namespace App\Http\Controllers;

use App\Parqueo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ParqueoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $parqueos = Parqueo::orderBy('id_parqueos') -> paginate(10);
        return view('parqueo.index',compact('parqueos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('parqueo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $request->validate([
            'id_zona' => 'required',
            'direccion' => 'required',
            'latitud_x' => 'required',
            'longitud_y' => 'required',
            'cantidad_p' => 'required',
            'foto' => 'required',
            'telefono_contacto_1' => 'required',
            'telefono_contacto_2' => 'required',
            'estado_funcionamiento' => 'required',
            'cat_estado_parqueo' => 'required',
            'cat_validacion' => 'required',
        ]);

        Parqueo::create($request->all());

        Session::flash('message','Parqueo creado correctamente');

        return redirect()->route('parqueo.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Parqueo $parqueo
     * @return \Illuminate\Http\Response
     */
    public function show(Parqueo $parqueo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Parqueo $parqueo
     * @return \Illuminate\Http\Response
     */

    public function edit(Parqueo $parqueo)
    {
        return view('parqueo.edit',compact('parqueo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Parqueo $parqueo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Parqueo $parqueo)
    {
        $request->validate([
            'id_zona' => 'required',
            'direccion' => 'required',
            'latitud_x' => 'required',
            'longitud_y' => 'required',
            'cantidad_p' => 'required',
            'foto' => 'required',
            'telefono_contacto_1' => 'required',
            'telefono_contacto_2' => 'required',
            'estado_funcionamiento' => 'required',
            'cat_estado_parqueo' => 'required',
            'cat_validacion' => 'required',
        ]);

        $parqueo->update($request->all());

        Session::flash('message','Parqueo actualizado correctamente');

        return redirect()->route('parqueo.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Parqueo $parqueo)
    {
        $parqueo->delete();

        Session::flash('message','Parqueo eliminado correctamente');

        return redirect()->route('parqueo.index');
    }

}
