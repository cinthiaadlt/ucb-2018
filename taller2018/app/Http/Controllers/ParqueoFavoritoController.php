<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ParqueosFavorito;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ParqueoFavoritoController extends Controller
{

    public function index()
    {
        $dias = DB::table('dias')
            ->select('*')
            ->orderBy('id_dias')
            ->get();

        $l = DB::table('parqueos_favoritos')
            ->select('*')
            ->join('users','users.id','=','parqueos_favoritos.id_user')
            ->join('parqueos','parqueos.id_parqueos','=','parqueos_favoritos.id_parqueos')
            ->where('id_user','=',Auth::id())
            ->orderBy('id_parqueos_favoritos','desc')
            ->paginate(5);

        foreach($l as $pro){
            $due=DB::table('parqueos')
                ->select('*')
                ->join('users','users.id','=','parqueos.id_users')
                ->where('id_parqueos','=',$pro->id_parqueos)
                ->get();
            //dd($due);
        }



        return view('cliente.favoritos', compact('l','dias','due'));
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show($idparqueo)
    {
        $consulta=DB::table('parqueos_favoritos')
            ->select('*')
            ->where('id_parqueos','=',$idparqueo)
            ->where('id_user','=',Auth::id())
            ->get();
        $can=$consulta->toArray();
        //dd($can);

        if($can!=null){
            return redirect('cliente')->with('danger','El parqueo ya esta almacenado en favoritos');
        }else{
            $cliente = auth()->user()->id;
            $fav = new ParqueosFavorito();
            $fav->id_parqueos= $idparqueo;
            $fav->id_user= $cliente;
            $fav->favorito = "descripcion";
            $fav->save();

            return redirect('cliente')->with('success','Guardado en parqueos favoritos');
        }
    }


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


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        ParqueosFavorito::find($id)->delete();
        return redirect('parqueos_favoritos')->with('success','Eliminado Exitosamente');
    }
}
