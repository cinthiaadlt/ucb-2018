<?php

namespace App\Http\Controllers;

use App\Vehiculo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon;

class VehiculoController extends Controller
{

    public function index()
    {
        $vh2 = DB::table('modelos')
            ->select('*')
            ->orderBy('id_modelos')
            ->get();
        return view('vehiculo.create',compact('vh2'));

    }


    public function list()
    {
        $usuario= auth()->user()->id;
        $v = DB::table('vehiculos')
            ->join('modelos','modelos.id_modelos','=','vehiculos.id_modelos')
            ->join('users','users.id','=','vehiculos.id_users')
            ->where('id_users','=',$usuario)
            ->orderBy('id_vehiculos','desc')
            ->paginate(5);

        return view('vehiculo.list', compact('v'));
    }

    public function store(Request $request)
    {

        $this->validate($request,[
            'id_modelos'=>'required',
            'color'=>'required|regex:/^[\pL\s\-]+$/u|max:20',
            'placa'=>'required|alpha_num|unique:vehiculos',
            'imagen' => 'required|image|max:5000',
            'cat_tipo_vehiculo'=> 'required|regex:/^[\pL\s\-]+$/u|max:30'
        ]);


        if($request->hasfile('imagen'))
        {
            $file = $request->file('imagen');
            $name=$file->getClientOriginalName();
            $file->move(public_path().'/images/', $name);

        }

        $cliente = auth()->user()->id;
        $v = new Vehiculo();
        $v->id_modelos = $request->input('id_modelos');
        $v->id_users= $cliente;
        $v->color = $request->input('color');
        $v->placa = $request->input('placa');
        $v->cat_tipo_vehiculo=$request->input('cat_tipo_vehiculo');
        $v->foto_vehiculo = $name;
        $v->save();

        return redirect()->action('VehiculoController@list');


    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {

        $vh2 = DB::table('modelos')
            ->select('*')
            ->orderBy('id_modelos')
            ->get();

        $vh = Vehiculo::find($id);
        return view('vehiculo.edit',compact(['vh','vh2']));
    }


    public function update(Request $request, $id_vehiculos)
    {
        $auto2 = Vehiculo::find($id_vehiculos);
        $this->validate($request,[
            'id_modelos'=>'required',
            'id_users'=>'required',
            'color'=>'required|regex:/^[\pL\s\-]+$/u|max:20',
            'placa'=>'required|alpha_num|unique:vehiculos,placa,'.$auto2->id_vehiculos.',id_vehiculos' ,
            'imagen' => 'nullable|image|max:5000',
            'cat_tipo_vehiculo'=> 'required|regex:/^[\pL\s\-]+$/u|max:30'
        ]);
        $auto=Vehiculo::find($id_vehiculos);
        $auto->id_modelos = $request->input('id_modelos');
        $auto->id_users = Auth::id();
        $auto->color = $request->input('color');
        $auto->placa = $request->input('placa');
        if($request->hasfile('imagen'))
        {
            $file = $request->file('imagen');
            $name=$file->getClientOriginalName();
            $file->move(public_path().'/images/', $name);
            $auto->foto_vehiculo = $name;
        }
        $auto->cat_tipo_vehiculo = $request->input('cat_tipo_vehiculo');
        $auto->save();
        return redirect()->action('VehiculoController@list');
    }


    public function destroy($id)
    {
        Vehiculo::find($id)->delete();
        return redirect()->action('VehiculoController@list');
    }
}
