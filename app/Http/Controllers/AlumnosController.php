<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Alumno;
use App\Carrera;
use App\Modalidad;

class AlumnosController extends Controller
{
    //Dentro del proyecto se ejecuta:
    //php artisan make:controller AlumnosController -r
    //Dentro del archivo routes/web.php
    //Route::resource('Alumnos','AlumnosController');

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*$alumno = new Alumno;
        $alumno->ncontrol='05940005';
        $alumno->nombre='juan';
        $alumno->ap_pat='ju';
        $alumno->ap_mat='an';
        $alumno->password='pass';
        $alumno->idmodalidad=1;
        $alumno->idcarrera='ISC';
        $alumno->save();*/
        //$r = Alumno::find('05940005');
        //
        $alumnos = Alumno::all();
        return view('alumnos.index', compact('alumnos')); //->with('alumnos',$alumnos);
        //se refiere a la variable $alumnos
        //return $alumnos;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $carreras = Carrera::orderBy('idcarrera','desc')->get()->pluck('nombre', 'idcarrera');
        $modalidades = Modalidad::get()->pluck('nombre', 'idmodalidad');
        //return $modalidades;
        //variable que guardara si el alumno esta repetido o no.
        $mensajes = '';
        return view('alumnos.create', compact('carreras', 'modalidades', 'mensajes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(isset($request->varios)){
                //variable que guardara si el alumno ya esta inscrito o no.
            $mensajes = "";
            //crear el objeto para guardar los datos del alumno a agregar
            $alumno = new Alumno;
            $alumno->ncontrol = $request->ncontrol;
            $alumno->nombre =mb_strtoupper($request->nombre, 'UTF-8');
            $alumno->ap_pat = mb_strtoupper($request->ap_pat, 'UTF-8');
            $alumno->ap_mat = mb_strtoupper($request->ap_mat, 'UTF-8');
            $alumno->password = hash('ripemd128', 'password');
            $alumno->idmodalidad = 1;
            $alumno->idcarrera = $request->idcarrera;

            //revisar que el estudianto no exista
            $numeralumno = Alumno::where('ncontrol', $alumno->ncontrol)->count();
            //si el estudiant existe, retornar la vista de create, pero con lo datos introducidos
            if ($numeralumno > 0) 
                return 'El numero de control ya existe:'.$alumno->ncontrol;
            //guardar al alumno si no esta dado de alta
            $alumno->save();
            return $alumno->ncontrol." Agregado";
        }

        //guardar un solo estudiante desde la vista
        //variable que guardara si el alumno ya esta inscrito o no.
        $mensajes = "";
        //crear el objeto para guardar los datos del alumno a agregar
        $alumno = new Alumno;
        $alumno->ncontrol = $request->ncontrol;
        //$alumno->nombre = strtoupper($request->nombre);
        $alumno->nombre =mb_strtoupper($request->nombre, 'UTF-8');
        $alumno->ap_pat = mb_strtoupper($request->ap_pat, 'UTF-8');
        $alumno->ap_mat = mb_strtoupper($request->ap_mat, 'UTF-8');
        $alumno->password = hash('ripemd128', 'password');
        $alumno->idmodalidad = $request->idmodalidad;
        $alumno->idcarrera = $request->idcarrera;

        //revisar que el estudianto no exista
        $numeralumno = Alumno::where('ncontrol', $alumno->ncontrol)->count();
        //si el estudiant existe, retornar la vista de create, pero con lo datos introducidos
        if ($numeralumno > 0) {
            $carreras = Carrera::get()->pluck('nombre', 'idcarrera');
            $modalidades = Modalidad::all()->pluck('nombre', 'idmodalidad');
            $mensajes = 'El numero de control ya existe:';
            //retornar la vista create
            return view('alumnos.create', compact("mensajes", 'carreras', 'modalidades', 'alumno'));
            //->with('mensajes','La licencia ya existe: '.$chofer->licencia);
        }
        //guardar al alumno
        $alumno->save();
        //llamar la accion Alumnos.index, no la no la vista index
        return redirect()->route("Alumnos.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //llamada: /Alumnos/05940005
    public function show($ncontrol)
    {
        $alumno=Alumno::find($ncontrol);
        if($alumno!=null)
            return $alumno->nombre." ".$alumno->ap_pat.' '.$alumno->ap_mat;
        else
            return "";
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
        $alumno=Alumno::find($id);
        $carreras = Carrera::get()->pluck('nombre', 'idcarrera');
        $modalidades = Modalidad::all()->pluck('nombre', 'idmodalidad');
        //mandar a traer a la vista edit
        return view("alumnos.edit",compact("alumno","carreras","modalidades"));
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
        $alumno = Alumno::find($id);
       //no se establece ncontrol, porque no se desea actualizar
        $alumno->nombre =mb_strtoupper($request->nombre, 'UTF-8');
        $alumno->ap_pat = mb_strtoupper($request->ap_pat, 'UTF-8');
        $alumno->ap_mat = mb_strtoupper($request->ap_mat, 'UTF-8');
        $alumno->idmodalidad = $request->idmodalidad;
        $alumno->idcarrera = $request->idcarrera;
        $alumno->save();
        //retornar la accion index del controller Alumnos
        return redirect()->route("Alumnos.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($ncontrol)
    {
        $alumno = Alumno::find($ncontrol);
        $alumno->delete();
        //regresar a una vista, pero no hay datos
        //return view('alumnos.index');
        //por lo tanto se prosigue a mandar llamar la accion index del controller "AlumnosController"
        return redirect()->route("Alumnos.index");
    }
    /**
     * Agregar varios alumnos sin direccionar a alguna vista
     * 
     */
    /*function buscar($ncontrol){
        return $ncontrol;
    }*/
}
