<?php

namespace App\Http\Controllers;

use App\Parqueo;
use App\Reserva;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Carbon;

class ReservaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $locations = DB::table('parqueos')->get();
        return view('cliente.busqueda_parqueo',compact('locations'));
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
        $gg=0;
        $cliente = auth()->user()->id;
        date_default_timezone_set('America/La_Paz');
        $fecha=date("Y-m-d");
        $this->validate($request,[
            'hora_inicio'=>'required',
            'hora_fin'=>'required'
        ]);
        //dd($request->input('id_parqueos'));
        //$request->input('id_parqueos');
        $v = new Reserva();
        $v->id_user= $cliente;
        $v->id_parqueos= $request->input('id_parqueos');
        $v->dia_reserva = $request->input('dia_reserva');
        $v->h_inicio_reserva = $request->input('hora_inicio');
        $v->h_fin_reserva=$request->input('hora_fin');
        //
        $parqueo = DB::table('parqueos')
                    ->select('*')
                    ->where('id_parqueos', $v->id_parqueos)
                    ->get();

        //ifs que determinan la validez de las horas dadas
        if(strtotime($v->h_inicio_reserva) < strtotime($parqueo[0]->hora_apertura)){
            echo '<script type="text/javascript">
                            alert("El parqueo abre a las: '.$parqueo[0]->hora_apertura.' cambie la hora de inicio de reserva e intente de nuevo");
                            </script>';
            $gg=1;
        }
        if(strtotime($v->h_fin_reserva) > strtotime($parqueo[0]->hora_cierre)){
            echo '<script type="text/javascript">
                            alert("El parqueo cierra a las: '.$parqueo[0]->hora_cierre.' cambie la hora de fin de reserva e intente de nuevo");
                            </script>';
            $gg=1;
        }
        date_default_timezone_set('America/La_Paz');
        if($v->dia_reserva == date("Y-m-d") && strtotime($v->h_inicio_reserva) < strtotime(date("H:i"))){
            echo '<script type="text/javascript">
                            alert("Ya son mas de las: '.$v->h_inicio_reserva.' cambie la hora de inicio de reserva e intente de nuevo");
                            </script>';
            $gg=1;
        }

        //condicional para ver si es success o fail
        if($gg==0){
            $v->save();
            return redirect('reservas')->with('success','Reserva Exitosa');
        }else{
            return $this->edit($v->id_parqueos);
        }
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
        $vh = Parqueo::find($id);
        return view('cliente.reserva_parqueo',compact('vh'));

    }


    /**
     *
     *
     *
     * $vh = DB::table('parqueos')
    ->select('*')
    ->where('id_parqueos',$id)
    ->orderBy('id_parqueos')
    ->get();
     *
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $cliente = auth()->user()->id;
        date_default_timezone_set('America/La_Paz');
        $fecha=date("Y-m-d");
        $this->validate($request,[
            'hora_inicio'=>'required',
            'hora_fin'=>'required'
        ]);
        //dd($request->input('id_parqueos'));
         $request->input('id_parqueos');
        $v = new Reserva();
        $v->id_user= $cliente;
        $v->id_parqueos= 1;
        $v->dia_reserva = $fecha;
        $v->h_inicio_reserva = $request->input('hora_inicio');
        $v->h_fin_reserva=$request->input('hora_fin');
        $v->estado_reserva = 1;
        $v->estado_espacio = 1;
        $v->save();

        
        return redirect('reservas')->with('success','Reserva Exitosa');

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

    public function lista_estado(){


        $l = DB::table('reservas')
            ->join('users','users.id','=','reservas.id_user')
            ->join('parqueos','parqueos.id_parqueos','=','reservas.id_parqueos')
            ->orderBy('id_reservas','desc')
            ->paginate(5);

        return view('cliente.lista_reservas', compact('l'));


    }

    public function facturar($id){

        return view('');
    }
}
