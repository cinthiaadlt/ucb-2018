<?php

namespace App\Http\Controllers;

use App\Validacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ValidacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pq2 = DB::table('zonas')
            ->select('*')
            ->orderBy('id_zonas')
            ->get();
        $parqueos=\App\Parqueo::paginate(10);
        return view('validacion.index',compact('parqueos','pq2'));

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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Validacion  $validacion
     * @return \Illuminate\Http\Response
     */
    public function show(Validacion $validacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Validacion  $validacion
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $parqueo = \App\Parqueo::find($id);

        $pq2 = DB::table('zonas')
            ->select('*')
            ->orderBy('id_zonas')
            ->get();
        return view('validacion.edit',compact('parqueo','id','pq2'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Validacion  $validacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if($request->input('estado_funcionamiento') == 'Aprobar')
        {
            $chozni = 1;
        }else{
            if($request->input('estado_funcionamiento') == 'Denegar')
            {
                $chozni = 2;
            }else{
                $chozni = 3;
            }
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
     * @param  \App\Validacion  $validacion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Validacion $validacion)
    {
        //
    }
}
