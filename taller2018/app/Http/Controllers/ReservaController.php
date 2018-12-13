<?php

namespace App\Http\Controllers;

use App\Parqueo;
use App\Reserva;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Validator;
use Carbon;

class ReservaController extends Controller
{

    public function index()
    {

        $locations = DB::table('parqueos')->get();
        return view('cliente.busqueda_parqueo',compact('locations'));
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
        ->get();
         $date = '==';
        $reservas=\App\Reserva::paginate(10);
        $reservas = \App\Reserva::orderBy('h_inicio_reserva')->get();
         return view('reserva.historia',compact('reservas','pq2','pq1','date'));
    }


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

        $hora_ap = Carbon\Carbon::parse($parqueo[0]->hora_apertura);
        $hora_ci = Carbon\Carbon::parse($parqueo[0]->hora_cierre);
        $hora_ap_reser = Carbon\Carbon::parse($v->h_inicio_reserva);
        $hora_ci_reser = Carbon\Carbon::parse($v->h_fin_reserva);
        $precio_hora=$parqueo[0]->tarifa_hora_normal;

        ///NUEVO, realiza una consulta de las reservas actuales del parqueo que se esta por reservar
        $id_parq = $v->id_parqueos;
        $diarev= $v->dia_reserva;
        $reservas_bd=DB::table('reservas')
            ->select('id_parqueos','dia_reserva','h_inicio_reserva','h_fin_reserva')
            ->where('id_parqueos','=',$id_parq)
            ->where('dia_reserva','=',$diarev)
            ->get();
        //dd($reservas_bd);


        //ifs que determinan la validez de las horas dadas
        if(strtotime($v->h_inicio_reserva) < strtotime($parqueo[0]->hora_apertura)){
            return back()->withInput()->withErrors('El parqueo abre a las: '.$parqueo[0]->hora_apertura.' cambie la hora de inicio de reserva e intente de nuevo');
        }

        //validar si la hora de reserva es mayor a hora cierre (Agregado para validar si la hora cierre del parqueo es las 00:00 NO SE SI SIRVE)
        if(strtotime($v->h_fin_reserva) > strtotime($parqueo[0]->hora_cierre)){
            if($hora_ci->hour == 0){
                if($hora_ap_reser >= $hora_ci_reser){
                    return back()->withInput()->withErrors('El parqueo cierra a las: '.$parqueo[0]->hora_cierre.' cambie la hora de fin de reserva e intente de nuevo');
                }
            }else{
                return back()->withInput()->withErrors('El parqueo cierra a las: '.$parqueo[0]->hora_cierre.' cambie la hora de fin de reserva e intente de nuevo');
            }
        }

        //Nuevo if para determinar que no se pueda reservar con hora de inicio igual a la hora fin
        if($request->input('hora_inicio') == $request->input('hora_fin')){
            return back()->withInput()->withErrors("La hora de inicio no puede ser la misma que la hora de fin de reserva, cambie las horas de reserva e intente de nuevo");
        }

        if($request->input('hora_inicio')>$request->input('hora_fin')){
            return back()->withInput()->withErrors("La hora de inicio no puede ser mayor que la hora de fin de reserva intente de nuevo");
        }



        date_default_timezone_set('America/La_Paz');
        if($v->dia_reserva == date("Y-m-d") && strtotime($v->h_inicio_reserva) < strtotime(date("H:i"))){
            return back()->withInput()->withErrors("Ya son mas de las: $v->h_inicio_reserva cambie la hora de inicio de reserva e intente de nuevo");
        }

        //algoritmo para determinar la validez de los dias habiles del parqueo
        $dias_habiles = DB::table('precios_alquiler')
                        ->select('*')
                        ->where('id_parqueos', $v->id_parqueos)
                        ->where('estado', false)
                        ->get();

        $hoje = array('Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun');
        //echo date('D', strtotime($v->dia_reserva));
        foreach($dias_habiles as $dias){
            //echo $dias->id_dias;
            if($hoje[$dias->id_dias-1] == date('D', strtotime($v->dia_reserva))){
                return back()->withInput()->withErrors('El parqueo no funciona el dia '.$v->dia_reserva.' cambie la fecha de reserva e intente de nuevo');
            }
        }

        //condicional para ver si ya no hay espacios disponibles
        if($parqueo[0]->cantidad_actual == 0){
            return back()->withInput()->withErrors('El parqueo se encuentra lleno.');
        }

        /*Este if deberia validar que no se reserve a la misma hora el mismo dia en un parqueo
         * if(($reservas_bd[0]->h_inicio_reserva == $request->input('hora_inicio')) && ($reservas_bd[0]->h_fin_reserva == $request->input('hora_fin'))){
            return back()->withInput()->withErrors('El parqueo ya fue reservado el dia: '.$request->input('dia_reserva').' en la hora'.$request->input('hora_inicio').' - '.$request->input('hora_fin') );
        }*/

        //condicional para ver si es success o fail

        $h_entrada=strtotime($v->h_inicio_reserva);
        $h_salida=strtotime($v->h_fin_reserva);
        $tiempores=($h_salida-$h_entrada)/60/60; //Se encuentran las horas que estara en el parqueo
        $precio=$tiempores*$precio_hora;
        $v->total_reserva=$precio;
        $v->estado_reserva='2'; // Reservado

        $v->save();
        //actualizar cantidad espacios disponibles parqueo
        DB::table('parqueos')
            ->where('id_parqueos', $v->id_parqueos)
            ->update(['cantidad_actual'=>$parqueo[0]->cantidad_actual-1]);

            
        return redirect('reservas')->with('success','Reserva Exitosa');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $vh = Parqueo::find($id);
        $dias = DB::table('precios_alquiler')
                        ->select('dias.nombre')
                        ->join('dias', 'dias.id_dias', '=', 'precios_alquiler.id_dias')
                        ->where('id_parqueos', $id)
                        ->where('estado', true)
                        ->get();

        return view('cliente.reserva_parqueo',compact('vh', 'dias'));

    }


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

        return view('cliente.lista_reservas');
    }
}
