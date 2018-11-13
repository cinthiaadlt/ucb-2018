<?php

namespace App\Http\Controllers;

use App\Parqueo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

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
        $parqueos=\App\Parqueo::paginate(10);
        return view('parqueo.index',compact('parqueos','pq2'));

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
        if($request->hasfile('filename'))
         {
            $file = $request->file('filename');
            $name=time().$file->getClientOriginalName();
            $file->move(public_path().'/images/', $name);
         }
        $parqueo= new \App\Parqueo;
        $parqueo->id_zonas = $request->input('id_zonas');
        $parqueo->direccion = $request->input('direccion');
        $parqueo->latitud_x = $request->input('latitud_x');
        $parqueo->longitud_y = $request->input('longitud_y');
        $parqueo->cantidad_p = $request->input('cantidad_p');
        $parqueo->foto = $name;
        $parqueo->telefono_contacto_1 = $request->input('telefono_contacto_1');
        $parqueo->telefono_contacto_2 = $request->input('telefono_contacto_2');
        $parqueo->estado_funcionamiento = 'false';
        $parqueo->cat_estado_parqueo = $request->input('cat_estado_parqueo');
        $parqueo->cat_validacion = $request->input('cat_validacion');
        $parqueo->save();

        //Vehiculo::create($request->all());

        //Session::flash('message','Zona creada correctamente');

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
        //configuaración
        $config = array();
        $config['center'] = 'auto';
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

        $parqueo = \App\Parqueo::find($id);
        $marker = array();
        $marker['position'] = ''. $parqueo->latitud_x . '' . ',' . '' .$parqueo->longitud_y . '';
        echo "<script>console.log( 'Debug Objects: " . $marker['position'] . "' );</script>";
        $marker['infowindow_content'] = 'Hello World!';
        \Gmaps::add_marker($marker);

        $map = \Gmaps::create_map();
        $pq2 = DB::table('zonas')
            ->select('*')
            ->orderBy('id_zonas')
            ->get();
        return view('parqueo.edit',compact('parqueo','id','pq2','map'));
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
        if($request->input('estado_funcionamiento') == 'Inactivo')
         {
            $chozni = 0;
         }else{
            $chozni = 1;
         }
        $parqueo= \App\Parqueo::find($id);
        $parqueo->id_zonas = $request->input('id_zonas');
        $parqueo->direccion = $request->input('direccion');
        $parqueo->latitud_x = $request->input('latitud_x');
        $parqueo->longitud_y = $request->input('longitud_y');
        $parqueo->cantidad_p = $request->input('cantidad_p');
        $parqueo->telefono_contacto_1 = $request->input('telefono_contacto_1');
        $parqueo->telefono_contacto_2 = $request->input('telefono_contacto_2');
        $parqueo->estado_funcionamiento = $chozni;
        $parqueo->cat_estado_parqueo = $request->input('cat_estado_parqueo');
        $parqueo->cat_validacion = $request->input('cat_validacion');
        $parqueo->save();
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

}
