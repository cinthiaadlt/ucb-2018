<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ReservaAnfitrionController extends Controller
{

    public function index()
    {
        $pq2 = DB::table('users')
            ->select('*')
            ->orderBy('id')
            ->get();
        $pq1 = DB::table('parqueos')
            ->select('*')
            ->where('id_users', Auth::id())
            ->orderBy('id_parqueos')
            ->get();
        $pq3 = DB::table('zonas')
            ->select('*')
            ->orderBy('id_zonas')
            ->get();

       $reservasanfitrion = DB::table('reservas')
                                ->select('*')
                                ->join('parqueos', 'parqueos.id_parqueos', '=', 'reservas.id_parqueos')
                                ->where('parqueos.id_users', Auth::id())
                                ->orderBy('h_inicio_reserva')
                                ->get();
       return view('reservaanfitrion.index',compact('reservasanfitrion','pq2','pq1','pq3'));
    }


    public function create()
    {
        //
        $pq2 = DB::table('users')
        ->select('*')
        ->orderBy('id')
        ->get();
         $pq1 = DB::table('parqueos')
        ->select('*')
        ->orderBy('id_parqueos')
        ->where('id_users', Auth::id())
        ->get();
        $pq3 = DB::table('zonas')
            ->select('*')
            ->orderBy('id_zonas')
            ->get();
         $reservasanfitrion = DB::table('reservas')
                                ->select('*')
                                ->join('parqueos', 'parqueos.id_parqueos', '=', 'reservas.id_parqueos')
                                ->where('parqueos.id_users', Auth::id())
                                ->where('estado_reserva','!=',2)
                                ->orderBy('h_inicio_reserva')
                                ->get();
         //dd($reservasanfitrion);
         return view('reservaanfitrion.historia',compact('reservasanfitrion','pq2','pq1','pq3'));
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
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

        //Boton cancelado de cliente reservaanfitrion.index
        //
        $reserva = \App\Reserva::find($id);

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
         * Reservado = 2
         */
        $reserva->estado_reserva='0';
        $reserva->update();
        return redirect('reservasanfitrion')->with('success','La reserva fue cancelada');
    }
}
