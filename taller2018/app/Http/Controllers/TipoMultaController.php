<?php

namespace App\Http\Controllers;
use App\TipoMulta;
use Illuminate\Http\Request;

class TipoMultaController extends Controller {
    public function index() {
        $multas = TipoMulta::all ();
        return view ('tipo_multas.index', compact ('multas'));
    }

    public function create()
    {
        return view ('tipo_multas.create');
    }

    public function store(Request $request) {
        $this->validate($request,[
          'nombre_tipo_multa'=>'required',
          'descripcion_multa'=>'required',
          'tarifa_multa'=>'required',
          'cat_grado_multa'=>'required'
        ]);
        $t_multa = new TipoMulta;
        $t_multa->nombre_tipo_multa = $request->input('nombre_tipo_multa');
        $t_multa->descripcion_multa = $request->input('descripcion_multa');
        $t_multa->tarifa_multa = $request->input('tarifa_multa');
        $t_multa->cat_grado_multa = $request->input('cat_grado_multa');
        $t_multa-> save ();
        return redirect ('/tipoMultas');
    }

    public function show($id) {
        $tipoMultas = TipoMulta::findOrFail($id);
        return view ('tipo_multas.show', compact ('tipoMultas'));
    }

    public function edit($id) {
        $tipoMultas = TipoMulta::findOrFail ($id);
        return view ('tipo_multas.edit', compact ('tipoMultas'));
    }

    public function update(Request $request, $id) {
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

    public function destroy($id) {
        TipoMulta::where('id_tipo_multa', $id)->delete ();
        return redirect ('/tipoMultas');
    }
}
