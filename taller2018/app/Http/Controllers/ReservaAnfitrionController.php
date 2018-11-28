<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ReservaAnfitrionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
                                ->orderBy('h_inicio_reserva')
                                ->get();
         return view('reservaanfitrion.historia',compact('reservasanfitrion','pq2','pq1','pq3'));
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
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        return redirect('reservasanfitrion')->with('success','Information has been  deleted');
    }
}
