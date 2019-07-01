<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Actividad;
class ActividadesController extends Controller
{
    /*
    Dentro del proyecto se ejecuta:
    php artisan make:controller ActividadesController -r
    Dentro del archivo routes/web.php
    Route::resource('Docentes','ActividadesController');
    */

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        /*$actividad = new Actividad;
        $actividad->nombre="RODALLA";
        $actividad->tipo="DEPORTIVA";
        $actividad->creditos=1;
        $actividad->save();*/
        $actividades = Actividad::get();
        return view('actividades.index',compact('actividades'));
        //return $actividad;

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    const tipos =['seleccione'=>'SELECCIONE',
    'CULTURAL'=>'CULTURAL','DEPORTIVA'=>'DEPORTIVA',
    'CIVICA'=>'CIVICA'];
    public function create()
    {
        $tipos=self::tipos;
        return view('actividades.create',compact('tipos'));
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
        $actividad = new Actividad;
        //$alumno->nombre =mb_strtoupper($request->nombre, 'UTF-8');
        $actividad->nombre=mb_strtoupper($request->nombre, 'UTF-8');
        $actividad->tipo=mb_strtoupper($request->tipo, 'UTF-8');
        $actividad->creditos=$request->creditos;
        $actividad->save();
        //ir a la accion index del controller Actividades
        return redirect()->route("Actividades.index");

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
         $tipos=self::tipos;
         $actividad=Actividad::find($id);
         //mandar a traer a la vista edit
         return view("actividades.edit",compact("actividad",'tipos'));
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
        //modificado para hacer git
        //segunda modificacion
        $actividad=Actividad::find($id);
        $actividad->nombre=mb_strtoupper($request->nombre, 'UTF-8');
        $actividad->tipo=mb_strtoupper($request->tipo, 'UTF-8');
        $actividad->creditos=$request->creditos;
        $actividad->save();
          //llamar la accion Docentes.index, no la no la vista index
          return redirect()->route("Actividades.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $actividad = Actividad::find($id);
        $actividad->delete();
        return redirect()->route("Actividades.index");    }
}
