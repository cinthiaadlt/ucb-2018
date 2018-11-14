<?php

namespace App\Http\Controllers;

use App\Denuncia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DenunciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $p2 = DB::table('denuncias')
            ->join('parqueos','parqueos.id_parqueos','=','denuncias.id_parqueos')
            ->join('usuarios','usuarios.id_usuarios','=','denuncias.id_usuarios')
            ->orderBy('id_denuncias','desc')
            ->paginate(5);
        //$p1 = Parqueo::find($id);
        return view('denuncia.index',compact('p2'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'id_parqueos'=>'required',
            'id_usuarios'=>'required',
            'descripcion_adicional'=>'required',
            'cat_nivel_gravedad'=>'required',
            'estado_denuncia'=>'required',
            'num_strikes'=>'required',
            'cat_tipo_denuncia'=>'required',

        ]);

        $denuncia = new Zona();
        $denuncia->id_parqueos = $request->input('id_parqueos');
        $denuncia->id_usuarios = $request->input('id_usuarios');
        $denuncia->descripcion_adicional = $request->input('descripcion_adicional');
        $denuncia->cat_nivel_gravedad = $request->input('cat_nivel_gravedad');
        $denuncia->estado_denuncia = $request->input('estado_denuncia');
        $denuncia->num_strikes = $request->input('num_strikes');
        $denuncia->cat_tipo_denuncia = $request->input('cat_tipo_denuncia');
        $denuncia->save();


        //Vehiculo::create($request->all());

        //Session::flash('message','Zona creada correctamente');

        return redirect()->action('DenunciaController@index')->with('success','La denuncia fue añadida');
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
        $d1 = DB::table('parqueos')
            ->select('*')
            ->orderBy('id_parqueos')
            ->get();

        $d2 = DB::table('usuarios')
            ->select('*')
            ->orderBy('id_usuarios')
            ->get();

        $denuncia = \App\Denuncia::find($id);

        return view('denuncia.edit',compact('denuncia','id','d1','d2'));

      //  $parqueo = \App\Parqueo::find($id);
        //$pq2 = DB::table('zonas')
            //->select('*')
          //  ->orderBy('id_zonas')
            //->get();
        //return view('parqueo.edit',compact('parqueo','id','pq2'));

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
        $request->validate([
            'id_parqueos'=>'required',
            'id_usuarios'=>'required',
            'descripcion_adicional'=>'required',
            'cat_nivel_gravedad'=>'required',
            'estado_denuncia'=>'required',
            'num_strikes'=>'required',
            'cat_tipo_denuncia'=>'required',

        ]);

        $denuncia->update($request->all());

        //Denuncia::find($id_denuncias)->update($request->all());

        // Session::flash('message','Zona actualizado correctamente');

        return redirect()->action('DenunciaController@index')->with('success','La denuncia fue revisada');

        if($request->input('estado_funcionamiento') == 'Inactivo')
        {
            $chozni = 0;
        }else{
            $chozni = 1;
        }
        $parqueo= \App\Parqueo::find($id);
        $parqueo->id_zonas = $request->input('id_zonas');
        $parqueo->direccion = $request->input('direccion');
        $parqueo->latitud_x = $request->input('latitud_x');
        $parqueo->longitud_y = $request->input('longitud_y');
        $parqueo->cantidad_p = $request->input('cantidad_p');
        $parqueo->telefono_contacto_1 = $request->input('telefono_contacto_1');
        $parqueo->telefono_contacto_2 = $request->input('telefono_contacto_2');
        $parqueo->estado_funcionamiento = $chozni;
        $parqueo->cat_estado_parqueo = $request->input('cat_estado_parqueo');
        $parqueo->cat_validacion = $request->input('cat_validacion');
        $parqueo->save();
        return redirect('parqueos');

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
    }
}
