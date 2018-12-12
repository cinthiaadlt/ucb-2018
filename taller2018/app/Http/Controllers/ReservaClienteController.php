<?php

namespace App\Http\Controllers;

use App\Denuncia;
use App\Reserva;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ReservaClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prueba = DB::table('reservas')
            ->select('*')
            ->join('parqueos','reservas.id_parqueos','=','parqueos.id_parqueos')
            ->join('zonas','parqueos.id_zonas','=','zonas.id_zonas')
            ->where('id_user', Auth::id())
            ->get();

        return view('reservacliente.index',compact('prueba'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $prueba = DB::table('reservas')
            ->select('*')
            ->join('parqueos','reservas.id_parqueos','=','parqueos.id_parqueos')
            ->join('zonas','parqueos.id_zonas','=','zonas.id_zonas')
            ->where('id_user', Auth::id())
            ->get();

        return view('reservacliente.historia',compact('prueba'));
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


    public function show($id)
    {
        $d1 = DB::table('parqueos')
            ->select('*')
            ->join('users','users.id','=','parqueos.id_users')
            ->where('id_parqueos',$id)
            ->get();
        //dd($d1);

        return view('denuncia.create',compact('d1'));
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
        //
        $reserva = \App\Reserva::find($id);
        //volver a subir el numero
        $parqueo = DB::table('parqueos')
                    ->select('*')
                    ->where('id_parqueos', $reserva->id_parqueos)
                    ->get();
        DB::table('parqueos')
            ->where('id_parqueos', $reserva->id_parqueos)
            ->update(['cantidad_actual'=>$parqueo[0]->cantidad_actual+1]);
        
        $reserva->delete();
        return redirect('reservacliente')->with('success','Information has been  deleted');
    }
}
