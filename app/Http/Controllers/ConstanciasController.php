<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Utilidades\Utilidades;
use App\Calificacion;
use App\Constancia;

class ConstanciasController extends Controller
{
     /*
    Dentro del proyecto se ejecuta:
    php artisan make:controller ConstanciasController -r
    Dentro del archivo routes/web.php
    Route::resource('Constancias','ConstanciasController');
    */

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $calificaciones = Calificacion::get();

        return view('constancias.index',compact('calificaciones'));
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $calificacion = Calificacion::find($id);
        //return $calificacion;

        /*$constancia = new Constancia();
        $constancia-> idcalificacion = $id;
        $constancia-> fecha_emision = \Carbon\Carbon::now();
        $constancia-> save();
        */
        $utilidades = new Utilidades;
        return $utilidades->generarConstancia($calificacion);
        //return  ;// __DIR__. "../../public/recursos/img/tec.jpg";
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
    }
}
