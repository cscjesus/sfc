<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Grupo;
use App\Utilidades\Utilidades;
use App\Actividad;
use App\Docente;
use App\Carrera;

class GruposController extends Controller
{
    /*
    Dentro del proyecto se ejecuta:
    php artisan make:controller GruposController -r
    Dentro del archivo routes/web.php
    Route::resource('Grupos','GruposController');
    */
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        /*$grupo = new Grupo;
        $grupo->idgrupo="2AISC";
        $grupo->periodo="ENEJUN19";
        $grupo->semestre="2";
        $grupo->iddocente=112;
        $grupo->idactividad=3;
        $grupo->idcarrera="ISC";
        $grupo->save();*/
        /*$utilidades = new Utilidades;
        return $utilidades->holaMundo();*/
        $grupos=Grupo::get();
        return view('grupos.index',compact('grupos'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    const grados =["seleccione"=>"GRADO","1"=>"1","2"=>"2","3"=>"3","4"=>"4","5"=>"5","6"=>"6","7"=>"7","8"=>"8"];
    const grupos =["seleccione"=>"GRUPO","A"=>"A","B"=>"B","C"=>"C","D"=>"D"];

    public function create()
    {
        //se agrego un comentario
        $mensajes = "";
        $grados = self::grados;
        $grupos = self::grupos;
        //$carreras = Carrera::get()->pluck('nombre', 'idcarrera');
        $carreras = Carrera::orderBy('idcarrera','desc')->get()->pluck('nombre', 'idcarrera');
        $docentes = Docente::select(
            \DB::raw("concat(nombre,' ',ap_pat,' ',ap_mat) as name, iddocente")
            )->get()->pluck('name', 'iddocente');
        $actividades = Actividad::get()->pluck('nombre', 'idactividad');
        return view('grupos.create',compact('carreras','docentes','actividades','grados','grupos','mensajes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $grupo = new Grupo;
        $grupo->idgrupo=$request->idgrupo;
        $grupo->periodo =$request->periodo;
        $grupo->semestre =$request->grado;
        $grupo->iddocente =$request->iddocente;
        $grupo->idactividad =$request->idactividad;
        $grupo->idcarrera =$request->idcarrera;
        //verificar que el grupo no exista
        
        $numgrupos = Grupo::where('idgrupo',$grupo->idgrupo)->count();
        if($numgrupos > 0){
            $mensajes ="El grupo: ".$grupo->idgrupo ." ya existe";
            $grados = self::grados;
            $grupos = self::grupos;
            $carreras = Carrera::get()->pluck('nombre', 'idcarrera');
            $docentes = Docente::select(
                \DB::raw("concat(nombre,' ',ap_pat,' ',ap_mat) as name, iddocente")
                )->get()->pluck('name', 'iddocente');
            $actividades = Actividad::get()->pluck('nombre', 'idactividad');
            return view('grupos.create',compact('carreras','docentes','actividades','grados','grupos','request','mensajes'));
        }
        $grupo->save();
        return redirect()->route("Grupos.index");
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
        $grupo=Grupo::find($id);
        $grupo->delete();
        return redirect()->route("Grupos.index");
    }
    public function retornaGrupos($periodo){
        $grupos = Grupo::where('periodo',$periodo)->get();
        return $grupos;
    }
}
