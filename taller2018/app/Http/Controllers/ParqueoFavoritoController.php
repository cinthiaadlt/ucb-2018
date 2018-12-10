<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ParqueosFavorito;
use Illuminate\Support\Facades\DB;

class ParqueoFavoritoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dias = DB::table('dias')
            ->select('*')
            ->orderBy('id_dias')
            ->get();

        $l = DB::table('parqueos_favoritos')
            ->join('users','users.id','=','parqueos_favoritos.id_user')
            ->join('parqueos','parqueos.id_parqueos','=','parqueos_favoritos.id_parqueos')
            ->orderBy('id_parqueos_favoritos','desc')
            ->paginate(5);

        return view('cliente.favoritos', compact('l','dias'));
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($idparqueo)
    {
        $cliente = auth()->user()->id;
        $fav = new ParqueosFavorito();
        $fav->id_parqueos= $idparqueo;
        $fav->id_user= $cliente;
        $fav->favorito = "descripcion";
        $fav->save();

        return redirect('cliente')->with('success','Guardado en parqueos favoritos');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($idparqueo)
    {
        $cliente = auth()->user()->id;
        $fav = new ParqueosFavorito();
        $fav->id_parqueos= $idparqueo;
        $fav->id_user= $cliente;
        $fav->favorito = "descripcion";
        $fav->save();

        return redirect('cliente')->with('success','Guardado en parqueos favoritos');
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ParqueosFavorito::find($id)->delete();
        return redirect('parqueos_favoritos')->with('success','Eliminado Exitosamente');
    }
}
