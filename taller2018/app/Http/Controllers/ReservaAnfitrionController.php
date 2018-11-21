<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
            ->orderBy('id_parqueos')
            ->get();
       $date = '==';
       $reservasanfitrion = DB::table('reservas')
                                ->select('*')
                                ->orderBy('h_inicio_reserva')
                                ->get();
       return view('reservaanfitrion.index',compact('reservasanfitrion','pq2','pq1','date'));
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
        ->get();
         $date = '==';
         $reservasanfitrion = DB::table('reservas')
         ->select('*')
         ->orderBy('h_inicio_reserva')
         ->get();
         return view('reservaanfitrion.historia',compact('reservasanfitrion','pq2','pq1','date'));
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
        $reserva->delete();
        return redirect('reservasanfitrion')->with('success','Information has been  deleted');
    }
}
