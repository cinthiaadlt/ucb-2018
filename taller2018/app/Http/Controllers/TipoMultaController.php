<?php

namespace App\Http\Controllers;
use App\TipoMulta;
use Illuminate\Http\Request;

class TipoMultaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $multas = TipoMulta::all ();
        return view ('tipo_multas.index', compact ('multas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view ('tipo_multas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      // $this->validate($request,[
          // 'nombre_tipo_multa'=>'required',
          // 'descripcion_multa'=>'required',
          // 'tarifa_multa'=>'required',
          // 'cat_grado_multa'=>'required',
        // ]);
        // $t_multa = new TipoMulta;
        // $multa->nombre_tipo_multa = $request->input(nombre_tipo_multa);
        // $multa->descripcion_multa = $request->input(descripcion_multa);
        // $multa->tarifa_multa = $request->input(tarifa_multa);
        // $multa->cat_grado_multa = $request->input(cat_grado_multa);
        // $multa-> save ();
        // TipoMulta::create ($request->all ());
        // return $request->get ('nombre_tipo_multa');
        // return 'a';
        $this->validate($request,[
          'nombre_tipo_multa'=>'required',
          'descripcion_multa'=>'required',
          'tarifa_multa'=>'required',
          'cat_grado_multa'=>'required',
        ]);
        $t_multa = new TipoMulta;
        $t_multa->nombre_tipo_multa = $request->input('nombre_tipo_multa');
        $t_multa->descripcion_multa = $request->input('descripcion_multa');
        $t_multa->tarifa_multa = $request->input('tarifa_multa');
        $t_multa->cat_grado_multa = $request->input('cat_grado_multa');
        $t_multa-> save ();
        return redirect ('/tipoMultas');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tipoMultas = TipoMulta::findOrFail($id);
        return view ('tipo_multas.show', compact ('tipoMultas'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tipoMultas = TipoMulta::findOrFail ($id);
        return view ('tipo_multas.edit', compact ('tipoMultas'));
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
        // $multa = TipoMulta::findOrFail($id);
        // $multa->update ($request->all());
        // return $multa;
        $this->validate($request,[
          'nombre_tipo_multa'=>'required',
          'descripcion_multa'=>'required',
          'tarifa_multa'=>'required',
          'cat_grado_multa'=>'required',
        ]);
        // $t_multa = new TipoMulta::find($id);
        $t_multa = TipoMulta::find ($id);
        $t_multa->nombre_tipo_multa = $request->input('nombre_tipo_multa');
        $t_multa->descripcion_multa = $request->input('descripcion_multa');
        $t_multa->tarifa_multa = $request->input('tarifa_multa');
        $t_multa->cat_grado_multa = $request->input('cat_grado_multa');
        $t_multa-> save ();
        return redirect ('/tipoMultas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $multa = TipoMulta::findOrFail($id);
        // $multa->delete ();
        TipoMulta::where('id_tipo_multa', $id)->delete ();
        return redirect ('/tipoMultas');
    }
}
