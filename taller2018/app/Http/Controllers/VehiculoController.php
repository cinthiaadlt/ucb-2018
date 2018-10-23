<?php

namespace App\Http\Controllers;

use App\Vehiculo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VehiculoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('vehiculo.create');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        $v = DB::table('vehiculos')
            ->orderBy('id_vehiculos','desc')
            ->paginate(5);

        return view('vehiculo.list', compact('v'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $v = new Vehiculo();
        $v->id_modelos = $request->input('id_modelos');
        $v->id_usuarios= $request->input('id_usuarios');
        $v->color = $request->input('color');
        $v->placa = $request->input('placa');
        $v->cat_tipo_vehiculo=$request->input('cat_tipo_vehiculo');
        $v->foto_vehiculo = $request->input('foto_vehiculo');

            $v->save();
        return redirect()->route('vehiculo.index');


       /*

        $this->validate($request,[
            'id_usuarios'=>'required',
            'id_modelos'=>'required',
            'color'=>'required',
            'placa'=>'required'

        ]);
        Vehiculo::create($request->all());
        return redirect()->route('vehiculo.create');
       */
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
        $vh = Vehiculo::find($id);
        return view('vehiculo.edit',compact('vh'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_vehiculos)
    {
        Vehiculo::find($id_vehiculos)->update($request->all());
        return redirect()->action('VehiculoController@list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Vehiculo::find($id)->delete();
        return redirect()->action('VehiculoController@list');
    }
}
