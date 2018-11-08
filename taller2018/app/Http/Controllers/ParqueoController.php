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
        $p = DB::table('parqueos')
            ->join('zonas','zonas.id_zonas','=','parqueos.id_zonas')
            ->orderBy('id_parqueos','desc')
            ->paginate(5);

        return view('parqueo.index',compact('p'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pq2 = DB::table('zonas')
            ->select('*')
            ->orderBy('id_zonas')
            ->get();
        return view('parqueo.create',compact('pq2'));
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
            'id_zonas' => 'required',
            'direccion' => 'required',
            'latitud_x' => 'required',
            'longitud_y' => 'required',
            'cantidad_p' => 'required',
            'foto' => 'required',
            'telefono_contacto_1' => 'required',
            'telefono_contacto_2' => 'required',
            'estado_funcionamiento' => 'required',
            'cat_estado_parqueo' => 'required',
            'cat_validacion' => 'required'
        ]);

        $p = new Parqueo();
        $p->id_zonas = $request->input('id_zonas');
        $p->direccion = $request->input('direccion');
        $p->latitud_x = $request->input('latitud_x');
        $p->longitud_y = $request->input('longitud_y');
        $p->cantidad_p = $request->input('cantidad_p');
        $p->foto = $request->input('foto');
        $p->telefono_contacto_1 = $request->input('telefono_contacto_1');
        $p->telefono_contacto_2 = $request->input('telefono_contacto_2');
        $p->estado_funcionamiento = $request->input('estado_funcionamiento');
        $p->cat_estado_parqueo = $request->input('cat_estado_parqueo');
        $p->cat_validacion = $request->input('cat_validacion');
        $p->save();

        //Vehiculo::create($request->all());

        //Session::flash('message','Zona creada correctamente');

        return redirect()->action('ParqueoController@index')->with('success','El parqueo fue añadido');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Parqueo $parqueo
     * @return \Illuminate\Http\Response
     */
    public function show(Parqueo $parqueo)
    {
        //return view('parqueo.show',compact('parqueo'));
    }

    public function denuncia(Parqueo $parqueo)
    {
        return view('parqueo.denuncia',compact('parqueo'));
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
