<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Docente;
class DocentesController extends Controller
{
    /*
    Dentro del proyecto se ejecuta:
    php artisan make:controller DocentesController -r
    Dentro del archivo routes/web.php
    Route::resource('Docentes','DocentesController');
    */

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //codigo para agregar un docente
       /* $docente = new Docente;
        $docente->iddocente = 112;
        $docente->nombre = strtoupper('jesus');
        $docente->ap_pat = strtoupper('hernandez');
        $docente->ap_mat = strtoupper('leon');
        $docente->password = hash('ripemd128', 'password');
        $docente->save();
*/
        $docentes=Docente::get();//obtener todos los docentes
        return view("docentes.index",compact('docentes'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $mensajes = '';
        $docente = new Docente();
        return view('docentes.create',compact('mensajes','docente'));
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

        $docente = new Docente;
        $docente->iddocente = $request->iddocente;
        //$actividad->nombre=mb_strtoupper($request->nombre, 'UTF-8');
        $docente->nombre = mb_strtoupper($request->nombre,'UTF-8');
        $docente->ap_pat = mb_strtoupper($request->ap_pat,'UTF-8');
        $docente->ap_mat = mb_strtoupper($request->ap_mat,'UTF-8');
        $docente->password = hash('ripemd128', 'docente');
        //verificar que el docente no exista
        $numerdocente = Docente::where('iddocente', $docente->iddocente)->count();
        if($numerdocente > 0){
            $mensajes='La clave del docente ya existe: '.$docente->iddocente;
            return view('docentes.create',compact("mensajes","docente"));
        }
        $docente->save();

         //llamar la accion Docentes.index, no la no la vista index
         return redirect()->route("Docentes.index");
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
        $docente=Docente::find($id);
        //mandar a traer a la vista edit
        return view("docentes.edit",compact("docente"));
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
        $docente=Docente::find($id);
        $docente->nombre = mb_strtoupper($request->nombre,'UTF-8');
        $docente->ap_pat = mb_strtoupper($request->ap_pat,'UTF-8');
        $docente->ap_mat = mb_strtoupper($request->ap_mat,'UTF-8');
        $docente->save();
          //llamar la accion Docentes.index, no la no la vista index
          return redirect()->route("Docentes.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $docente = Docente::find($id);
        $docente->delete();
        return redirect()->route("Docentes.index");

    }
}
