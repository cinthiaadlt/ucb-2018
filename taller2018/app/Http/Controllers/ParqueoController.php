<?php

namespace App\Http\Controllers;

use App\Parqueo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use Carbon;

class ParqueoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $pq2 = DB::table('zonas')
            ->select('*')
            ->orderBy('id_zonas')
            ->get();

        $dias = DB::table('dias')
            ->select('*')
            ->orderBy('id_dias')
            ->get();

        $parqueos=\App\Parqueo::paginate(10);
        $parqueos = \App\Parqueo::where('id_users',Auth::id())->orderBy('id_parqueos')->get();

  
        return view('parqueo.index',compact('parqueos','pq2','dias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
           //configuaración
           $config = array();
           $config['center'] = 'auto';
           $config['map_width'] = 'auto';
           $config['map_height'] = 400;
           $config['zoom'] = '15';
           $config['onboundschanged'] = 'if (!centreGot) {
               var mapCentre = map.getCenter();
               marker_0.setOptions({
                   position: new google.maps.LatLng(mapCentre.lat(), mapCentre.lng())
   
               });
           }
           centreGot = true;';
   
           \Gmaps::initialize($config);
   
           // Colocar el marcador
           // Una vez se conozca la posición del usuario
   
           $marker = array();
           $marker['position'] = 'auto';
           $marker['infowindow_content'] = 'Posicion Actual';
           $marker['draggable'] = true;
           $marker['ondragend'] = 'document.getElementById("lat").value = event.latLng.lat(); document.getElementById("lon").value = event.latLng.lng();';
           \Gmaps::add_marker($marker);
   
           $map = \Gmaps::create_map();

        $pq2 = DB::table('zonas')
            ->select('*')
            ->orderBy('id_zonas')
            ->get();
        
        return view('parqueo.create',compact('pq2','map'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $request->validate([
            'latitud_x' => 'required',
            'longitud_y' => 'required',
            'telefono_contacto_1' => 'required|numeric|digits_between:5,10',
            'imagen' => 'required|image|max:5000',
            'tarifa_hora_normal' => 'required|numeric|between:0, 20.00',
            'dia' => 'required'
        ]);

        if($request->hasfile('imagen'))
         {
            $file = $request->file('imagen');
            $name=$file->getClientOriginalName();
            $file->move(public_path().'/images/', $name);
         }
        $parqueo= new \App\Parqueo;
        $parqueo->id_users = Auth::id();
        $parqueo->id_zonas = $request->input('id_zonas');
        $parqueo->direccion = $request->input('direccion');
        $parqueo->latitud_x = $request->input('latitud_x');
        $parqueo->longitud_y = $request->input('longitud_y');
        $parqueo->cantidad_p = $request->input('cantidad_p');
        $parqueo->cantidad_actual = $request->input('cantidad_p');
        $parqueo->foto = $name;
        $parqueo->telefono_contacto_1 = $request->input('telefono_contacto_1');
        $parqueo->telefono_contacto_2 = $request->input('telefono_contacto_2');
        $parqueo->hora_apertura = $request->input('hora_apertura');
        $parqueo->hora_cierre = $request->input('hora_cierre');
        $parqueo->tarifa_hora_normal = $request->input('tarifa_hora_normal');
        $parqueo->estado_funcionamiento = 'false';
        $parqueo->cat_estado_parqueo = $request->input('cat_estado_parqueo');
        $parqueo->cat_validacion = $request->input('cat_validacion');

        //algoritmo para determinar el estado de los dias con los checkbox
        $array = array('Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo');
        $estado = array();
        $myCheckboxes = $request->input('dia');
                for($i = 0; $i <= 6; $i++){
                    $aux = 0;
                    foreach($myCheckboxes as $value){
                    if($value == $array[$i]){
                        //echo $value.'original'."<br>";
                        array_push($estado, true);
                        $aux=1;
                        break;
                    }
                }
                if($aux == 0){
                    //echo $array[$i].'fake'."<br>";
                    array_push($estado, false);
                }
            }
            //dd($estado);

                //validar que la hora de inicio sea mayor a la de fin
                if($parqueo->hora_apertura > $parqueo->hora_cierre){
                    return back()->withInput()->withErrors("Hora Apertura: $parqueo->hora_apertura mayor a Hora Cierre: $parqueo->hora_cierre");
                }
        
                //parsear el string de horas a tiempo
                $hora_ap = Carbon\Carbon::parse($parqueo->hora_apertura);
                $hora_ci = Carbon\Carbon::parse($parqueo->hora_cierre);
                //echo $hora_ap->diffInHours($hora_ci);
                //echo $hora_ap->diffInMinutes($hora_ci) - $hora_ap->diffInHours($hora_ci)*60;
        
                //validar que tengan una hora de diferencia
                if($hora_ap->diffInHours($hora_ci) == 0 && $hora_ap->diffInMinutes($hora_ci) - $hora_ap->diffInHours($hora_ci)*60 < 60){
                    return back()->withInput()->withErrors("Hora Apertura: $parqueo->hora_apertura debe tener como minimo una hora de diferencia con Hora Cierre: $parqueo->hora_cierre");
                }
        
                //validar que tengan una hora de diferencia
                if($hora_ap->diffInMinutes($hora_ci) - $hora_ap->diffInHours($hora_ci)*60 != 0){
                    return back()->withInput()->withErrors("Hora Apertura: $parqueo->hora_apertura debe tener exactamente horas de diferencia con Hora Cierre: $parqueo->hora_cierre (Ejemplo: 10:00-15:00)");
                }
        
                //validar que tengan una hora de diferencia
                if($hora_ap->minute != 0 || $hora_ci->minute != 0){
                    if($hora_ap->minute != 30 || $hora_ci->minute != 30){
                    return back()->withInput()->withErrors("Las horas deben ser unicamente cada media hora (Ejemplos: 10:00, 10:30, 11:00, 11:30)");
                    }
                }

        $parqueo->save();

                //insert de los dias al sistema
                for($i = 1; $i <= 7; $i++){
                    DB::table('precios_alquiler')->insert(
                        array(
                            'id_parqueos' => $parqueo->id_parqueos,
                            'id_dias' => $i,
                            'estado' => $estado[$i-1]
                        )
                    );
                }

        return redirect('parqueos')->with('success', 'Parqueo Anadido');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Parqueo $parqueo
     * @return \Illuminate\Http\Response
     */
    public function show(Parqueo $parqueo)
    {
        //return view('parqueo.show',compact('parqueo'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Parqueo $parqueo
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        
        $parqueo = \App\Parqueo::find($id);
        //configuaración
        $config = array();
        $config['center'] = ''. $parqueo->latitud_x . '' . ',' . '' .$parqueo->longitud_y . '';
        $config['map_width'] = 'auto';
        $config['map_height'] = 400;
        $config['zoom'] = 15;
        $config['onboundschanged'] = 'if (!centreGot) {
            var mapCentre = map.getCenter();
            marker_0.setOptions({
                position: new google.maps.LatLng(mapCentre.lat(), mapCentre.lng())

            });
        }
        centreGot = true;';

        \Gmaps::initialize($config);

        // Colocar el marcador
        // Una vez se conozca la posición del usuario

        $marker = array();
        $marker['position'] = ''. $parqueo->latitud_x . '' . ',' . '' .$parqueo->longitud_y . '';
        $marker['draggable'] = true;
        $marker['ondragend'] = 'document.getElementById("lat").value = event.latLng.lat(); document.getElementById("lon").value = event.latLng.lng();';
        $marker['infowindow_content'] = 'Ubicacion Actual';
        \Gmaps::add_marker($marker);

        $map = \Gmaps::create_map();
        $pq2 = DB::table('zonas')
            ->select('*')
            ->orderBy('id_zonas')
            ->get();

        $validado = DB::table('precios_alquiler')
            ->select('*')
            ->where('id_parqueos', $id)
            ->orderBy('id_precios_alquiler')
            ->get();

        $dias = DB::table('dias')
            ->select('*')
            ->orderBy('id_dias')
            ->get();

        return view('parqueo.edit',compact('parqueo','id','pq2','map','validado','dias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Parqueo $parqueo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'latitud_x' => 'required',
            'longitud_y' => 'required',
            'telefono_contacto_1' => 'required|numeric|digits_between:5,10',
            'telefono_contacto_2' => 'nullable|numeric|digits_between:5,10',
            'imagen' => 'nullable|image|max:5000',
            'tarifa_hora_normal' => 'required|numeric|between:0, 20.00',
            'dia' => 'required'
        ]);

        $gg=0;
        if($request->input('estado_funcionamiento') == 'Inactivo')
         {
            $chozni = 0;
         }else{
            $chozni = 1;
         }

        $parqueo= \App\Parqueo::find($id);
        $parqueo->id_users = Auth::id();
        $parqueo->id_zonas = $request->input('id_zonas');
        $parqueo->direccion = $request->input('direccion');
        $parqueo->latitud_x = $request->input('latitud_x');
        $parqueo->longitud_y = $request->input('longitud_y');
        $parqueo->cantidad_p = $request->input('cantidad_p');
        $parqueo->cantidad_actual = $request->input('cantidad_p');
        if($request->hasfile('imagen'))
        {
           $file = $request->file('imagen');
           $name=$file->getClientOriginalName();
           $file->move(public_path().'/images/', $name);
           $parqueo->foto = $name;
        }
        $parqueo->telefono_contacto_1 = $request->input('telefono_contacto_1');
        $parqueo->telefono_contacto_2 = $request->input('telefono_contacto_2');
        $parqueo->hora_apertura = $request->input('hora_apertura');
        $parqueo->hora_cierre = $request->input('hora_cierre');
        $parqueo->tarifa_hora_normal = $request->input('tarifa_hora_normal');
        $parqueo->estado_funcionamiento = $chozni;
        $parqueo->cat_estado_parqueo = $request->input('cat_estado_parqueo');
        $parqueo->cat_validacion = $request->input('cat_validacion');
        $parqueo->save();

        $myCheckboxes = $request->input('dia');
        
        DB::table('precios_alquiler')
        ->where('id_parqueos', $id)
        ->delete();

        for($i = 1, $aux = 0; $i <= 7; $i++){
               $estado = false;
               if(count($myCheckboxes) > $aux){
                     if($i == $myCheckboxes[$aux]){
                        $estado = true;
                        $aux++;
                     }
               }
                DB::table('precios_alquiler')->insert(
                array(
                    'id_parqueos' => $id,
                    'id_dias' => $i,
                    'estado' => $estado
                )
            );
        }

        //verificar si hay reservas activas
        $verificar = DB::table('precios_alquiler')
                        ->select('*')
                        ->where('id_parqueos', $id)
                        ->get();

        $reservasanfitrion = DB::table('reservas')
                        ->select('*')
                        ->join('parqueos', 'parqueos.id_parqueos', '=', 'reservas.id_parqueos')
                        ->where('parqueos.id_users', Auth::id())
                        ->where('parqueos.id_parqueos', $id)
                        ->orderBy('h_inicio_reserva')
                        ->get();
        date_default_timezone_set('America/La_Paz');
        $mytime = Carbon\Carbon::now();
        //echo $mytime->toDateString();
        //echo $verificar;

        //verificar si existe alguna reserva activa cuando unboxeamos algun dia
        $hoje = array('Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun');
        $chozni = array('Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo');
        foreach($verificar as $veri){
            if($veri->estado == false){
                //echo 0 ."dia". $veri->id_dias;
                for($i =0 ; $i < count($reservasanfitrion); $i++){
                    if($mytime->toDateString() <= $reservasanfitrion[$i]->dia_reserva){
                        //echo date('D', strtotime($reservasanfitrion[$i]->dia_reserva));
                        if(date('D', strtotime($reservasanfitrion[$i]->dia_reserva)) == $hoje[$veri->id_dias-1]){
                            DB::table('precios_alquiler')
                                ->where('id_parqueos', $id)
                                ->where('id_dias', $veri->id_dias)
                                ->update(['estado'=>true]);
                            
                            return back()->withErrors('Existe una reserva activa el dia '.$chozni[$veri->id_dias-1].' eliminela e intente de nuevo');
                        }
                    }
                }
            }
        }

        //validar que la hora de inicio sea mayor a la de fin
        if($parqueo->hora_apertura > $parqueo->hora_cierre){
            return back()->withErrors("Hora Apertura: $parqueo->hora_apertura mayor a Hora Cierre: $parqueo->hora_cierre");
        }

        //parsear el string de horas a tiempo
        $hora_ap = Carbon\Carbon::parse($parqueo->hora_apertura);
        $hora_ci = Carbon\Carbon::parse($parqueo->hora_cierre);
        //echo $hora_ap->diffInHours($hora_ci);
        //echo $hora_ap->diffInMinutes($hora_ci) - $hora_ap->diffInHours($hora_ci)*60;

        //validar que tengan una hora de diferencia
        if($hora_ap->diffInHours($hora_ci) == 0 && $hora_ap->diffInMinutes($hora_ci) - $hora_ap->diffInHours($hora_ci)*60 < 60){
            return back()->withErrors("Hora Apertura: $parqueo->hora_apertura debe tener como minimo una hora de diferencia con Hora Cierre: $parqueo->hora_cierre");
        }

        //validar que tengan una hora de diferencia
        if($hora_ap->diffInMinutes($hora_ci) - $hora_ap->diffInHours($hora_ci)*60 != 0){
            return back()->withErrors("Hora Apertura: $parqueo->hora_apertura debe tener exactamente horas de diferencia con Hora Cierre: $parqueo->hora_cierre (Ejemplo: 10:00-15:00)");
        }

        //validar que tengan una hora de diferencia
        if($hora_ap->minute != 0 || $hora_ci->minute != 0){
            if($hora_ap->minute != 30 || $hora_ci->minute != 30){
            return back()->withErrors("Las horas deben ser unicamente cada media hora (Ejemplos: 10:00, 10:30, 11:00, 11:30)");
            }
        }

        //si todo es correcto volver a parqueos
        return redirect('parqueos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $parqueo = \App\Parqueo::find($id);
        $parqueo->delete();
        return redirect('parqueos')->with('success','Information has been deleted');
    }

    /*public function getParqueoEdit()
    {
        $pq2 = DB::table('zonas')
            ->select('*')
            ->orderBy('id_zonas')
            ->get();
        return view('parqueo.edit',compact('parqueo','id','pq2','map'));
    }*/



}
