<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ReservaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pq2 = DB::table('usuarios')
            ->select('*')
            ->orderBy('id_usuarios')
            ->get();
        $pq1 = DB::table('precios_alquiler')
            ->select('*')
            ->orderBy('id_precios_alquiler')
            ->get();
       $date = '==';
       $reservas=\App\Reserva::paginate(10);
       $reservas = \App\Reserva::orderBy('h_inicio_reserva')->get();
       return view('reserva.index',compact('reservas','pq2','pq1','date'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $pq2 = DB::table('usuarios')
        ->select('*')
        ->orderBy('id_usuarios')
        ->get();
         $pq1 = DB::table('precios_alquiler')
        ->select('*')
        ->orderBy('id_precios_alquiler')
        ->get();
         $date = '==';
        $reservas=\App\Reserva::paginate(10);
        $reservas = \App\Reserva::orderBy('h_inicio_reserva')->get();
         return view('reserva.historia',compact('reservas','pq2','pq1','date'));
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
        $reserva = \App\Reserva::find($id);
        $reserva->delete();
        return redirect('reservas')->with('success','Information has been  deleted');
    }
}
