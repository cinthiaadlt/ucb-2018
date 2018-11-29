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
        $vh2 = DB::table('modelos')
            ->select('*')
            ->orderBy('id_modelos')
            ->get();
        return view('vehiculo.create',compact('vh2'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        $v = DB::table('vehiculos')
            ->join('modelos','modelos.id_modelos','=','vehiculos.id_modelos')
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
        $this->validate($request,[
            'id_modelos'=>'required',
            'id_users'=>'required',
            'color'=>'required',
            'placa'=>'required',
            'foto_vehiculo' => 'required',
            'cat_tipo_vehiculo'=> 'required'

        ]);
        $cliente = auth()->user()->id;
        $v = new Vehiculo();
        $v->id_modelos = $request->input('id_modelos');
        $v->id_users= $cliente;
        $v->color = $request->input('color');
        $v->placa = $request->input('placa');
        $v->cat_tipo_vehiculo=$request->input('cat_tipo_vehiculo');
        $v->foto_vehiculo = $request->input('foto_vehiculo');
        $v->save();


        //Vehiculo::create($request->all());
        return redirect()->action('VehiculoController@list');


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

        $vh2 = DB::table('modelos')
            ->select('*')
            ->orderBy('id_modelos')
            ->get();

        $vh = Vehiculo::find($id);
        return view('vehiculo.edit',compact(['vh','vh2']));
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
        $this->validate($request,[
            'id_modelos'=>'required',
            'id_users'=>'required',
            'color'=>'required',
            'placa'=>'required',
            'foto_vehiculo' => 'required',
            'cat_tipo_vehiculo'=> 'required'

        ]);


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
