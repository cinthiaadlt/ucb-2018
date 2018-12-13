<?php

namespace App\Http\Controllers;

use App\Denuncia;
use App\Reserva;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ReservaClienteController extends Controller
{

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

    }


    public function update(Request $request, $id)
    {


    }


    public function finalizar($id){

        //
        //Boton finalizar reserva de cliente reserva.index
        //
        $reserva = DB::table('reservas')->where('id_reservas','=',$id)->first();

        //dd($id);
        $parqueo = DB::table('parqueos')
            ->select('*')
            ->where('id_parqueos', $reserva->id_parqueos)
            ->get();

        //volver a subir el numero
        DB::table('parqueos')
            ->where('id_parqueos', $reserva->id_parqueos)
            ->update(['cantidad_actual'=>$parqueo[0]->cantidad_actual+1]);

        //$reserva->delete();
        /*
         * Estados
         * Cancelado = 0
         * Finalizada = 1
         */

        DB::table('reservas')
            ->where('id_reservas',$id)
            ->update(['estado_reserva'=> '1'] );

        //$reserva->estado_reserva='1';
        //$reserva->update('');

        return redirect('reservacliente')->with('success','Se finalizo la reserva');
    }


    public function destroy($id)
    {
        //Boton cancelado de cliente reserva.index
        //
        $reserva = \App\Reserva::find($id);
        //dd($reserva);
        $parqueo = DB::table('parqueos')
                    ->select('*')
                    ->where('id_parqueos', $reserva->id_parqueos)
                    ->get();

        //volver a subir el numero
        DB::table('parqueos')
            ->where('id_parqueos', $reserva->id_parqueos)
            ->update(['cantidad_actual'=>$parqueo[0]->cantidad_actual+1]);
        
        //$reserva->delete();
        /*
         * Estados
         * Cancelado = 0
         * Finalizada = 1
         */
        $reserva->estado_reserva='0';
        $reserva->update();
        return redirect('reservacliente')->with('success','La reserva fue cancelada');
    }
}
