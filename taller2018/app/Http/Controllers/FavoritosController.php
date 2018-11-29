<?php

namespace App\Http\Controllers;

use App\ParqueoFavoritos;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class FavoritosController extends Controller
{
    public function list()
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

        return view('cliente.favoritos', compact(['l','dias']));
    }

    public function eliminar($id){
        ParqueoFavoritos::find($id)->delete();
        return redirect()->action('FavoritosController@list');
    }

    public function mostrar_parqueo($id){


    }



}
