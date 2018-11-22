<?php
namespace App\Http\Controllers;
use App\Denuncia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class DenunciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       //
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $d1 = DB::table('parqueos')
            ->select('*')
            ->orderBy('id_parqueos')
            ->get();
        $d2 = DB::table('users')
            ->select('*')
            ->orderBy('id')
            ->get();

        return view('denuncia.create',compact('d1','d2'));


    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->input('cat_tipo_denuncia') == '1'||$request->input('cat_tipo_denuncia') == '7'||$request->input('cat_tipo_denuncia') == '5')
        {
            $chozni = 1;
        }else{
            if($request->input('cat_tipo_denuncia') == '6'||$request->input('cat_tipo_denuncia') == '4')
            {
                $chozni = 2;
            }else{
                $chozni = 3;
            }
        }

        $this->validate($request,[
            'id_parqueos'=>'required',
            'id'=>'required',
            'descripcion_adicional'=>'required',
            'estado_denuncia'=>'required',
            'cat_tipo_denuncia'=>'required',

        ]);

        $denuncia = new Denuncia();
        $denuncia->id_parqueos = $request->input('id_parqueos');
        $denuncia->id = $request->input('id');
        $denuncia->descripcion_adicional = $request->input('descripcion_adicional');
        $denuncia->cat_nivel_gravedad = $chozni;
        $denuncia->estado_denuncia = $request->input('estado_denuncia');
        $denuncia->num_strikes = "1";
        $denuncia->cat_tipo_denuncia = $request->input('cat_tipo_denuncia');
        $denuncia->save();

        //Vehiculo::create($request->all());

        //Session::flash('message','Zona creada correctamente');

        return redirect()->action('DenunciaController@show', $denuncia->id_parqueos)->with('success','La denuncia fue añadida');



    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $p2 = DB::table('denuncias')
            ->join('parqueos','parqueos.id_parqueos','=','denuncias.id_parqueos')
            ->join('users','users.id','=','denuncias.id')
            ->orderBy('id_denuncias','desc')
            ->paginate(5);
        //$p1 = Parqueo::find($id);
        return view('denuncia.index',compact('p2','id'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $denuncia = \App\Denuncia::find($id);
        $d1 = DB::table('parqueos')
            ->select('*')
            ->orderBy('id_parqueos')
            ->get();
        $d2 = DB::table('users')
            ->select('*')
            ->orderBy('id')
            ->get();

        return view('denuncia.edit',compact('denuncia','id','d1','d2'));
        //  $parqueo = \App\Parqueo::find($id);
        //$pq2 = DB::table('zonas')
        //->select('*')
        //  ->orderBy('id_zonas')
        //->get();
        //return view('parqueo.edit',compact('parqueo','id','pq2'));
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
        $denuncia= \App\Denuncia::find($id);
        $denuncia->id_parqueos = $request->input('id_parqueos');
        $denuncia->id = $request->input('id');
        $denuncia->descripcion_adicional = $request->input('descripcion_adicional');
        $denuncia->cat_nivel_gravedad = $request->input('cat_nivel_gravedad');
        $denuncia->estado_denuncia = $request->input('estado_denuncia');
        $denuncia->num_strikes = $request->input('num_strikes');
        $denuncia->cat_tipo_denuncia = $request->input('cat_tipo_denuncia');
        $denuncia->save();
        return redirect()->action('DenunciaController@show', $denuncia->id_parqueos)->with('success','La denuncia fue revisada');
        //return redirect('parqueos');
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
    }
}
