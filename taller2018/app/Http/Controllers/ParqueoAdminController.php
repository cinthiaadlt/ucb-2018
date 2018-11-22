<?php

namespace App\Http\Controllers;

use App\ParqueoAdmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ParqueoAdminController extends Controller
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


        return view('parqueo_admin.index',compact('parqueos','pq2','dias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  \App\ParqueoAdmin  $parqueoAdmin
     * @return \Illuminate\Http\Response
     */
    public function show(ParqueoAdmin $parqueoAdmin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ParqueoAdmin  $parqueoAdmin
     * @return \Illuminate\Http\Response
     */
    public function edit(ParqueoAdmin $parqueoAdmin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ParqueoAdmin  $parqueoAdmin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ParqueoAdmin $parqueoAdmin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ParqueoAdmin  $parqueoAdmin
     * @return \Illuminate\Http\Response
     */
    public function destroy(ParqueoAdmin $parqueoAdmin)
    {
        //
    }
}
