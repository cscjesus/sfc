<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Calificacion;
use App\Grupo;
use PhpParser\Node\Stmt\Return_;
use App\Alumno;
use Illuminate\Support\Facades\Session;

class CalificacionesController extends Controller
{
    /*
    Dentro del proyecto se ejecuta:
    php artisan make:controller CalificacionesController -r
    Dentro del archivo routes/web.php
    Route::resource('Calificaciones','CalificacionesController');
    */
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //public function index(Request $req)
    public function index($periodos = null, $grupos = null)
    {
        //si se llamo el metodo store, entonces desde ahi se le pasa el grupo y periodo
        if (Session::get('grupos') != null && Session::get('periodos') != null) {
            $grupos = Session::get('grupos');
            $periodos = Session::get('periodos');
        }
        /*$calificacion = new Calificacion;
        $calificacion->calificacion="EXCELENTE";
        $calificacion->ncontrol="05940003";
        $calificacion->idgrupo="1AIE19";
        $calificacion->save();
        $periodos ="";
        $grupos="";
        if(isset($req->grupos)){
            $calificaciones = Calificacion::where('idgrupo',$req->grupos)->get();
            //$calificaciones = Calificacion::get();
            $periodos = $req->periodos;
            $grupos = $req->grupos;
            return view('calificaciones.index',compact('calificaciones','periodos',"grupos"));
        }
        else
            return view("calificaciones.index",compact("periodos","grupos"));*/
        $docente = "";
        if (isset($grupos) && $grupos != 'seleccione') {
            $calificaciones = Calificacion::where('idgrupo', $grupos)->get();
            if ($calificaciones->count() > 0) { //verificar si hay calificaciones
                $calificacion = $calificaciones->first();
                //$docente = $calificacion->grupo->docente->nombre." ".$calificacion->grupo->docente->ap_pat." - ".$calificacion->grupo->idcarrera;
                $docente = $calificacion->grupo->docente->nombre_completo . " - " . $calificacion->grupo->idcarrera;
            } else {
                $grupo = Grupo::where("idgrupo", $grupos)->first();
                //$docente = $grupo->docente;
                $docente = $grupo->docente->nombre . " " . $grupo->docente->ap_pat . " - " . $grupo->idcarrera;
            }

            return view('calificaciones.index', compact('calificaciones', 'periodos', "grupos", "docente"));
        } else
            return view("calificaciones.index", compact("periodos", "grupos", "docente"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return $request;
        // no se necesitan estas acciones ni una vista para crear
        return "Dentro de calificaciones create";
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //si se agregaran varias calificaciones
        if (isset($request->varios)) {
            $alumno = Alumno::find($request->ncontrol);
            if ($alumno != null) {
                $calificacion = new Calificacion;
                $calificacion->ncontrol = $request->ncontrol;
                $calificacion->idgrupo = $request->idgrupo;
                $calificacion->calificacion = strtoupper($request->calificacion);
                $calificacion->save();

                return "Agregado";
            } else
                return "El numero de control no existe: " + $request->ncontrol;
        } else {

            $alumno = Alumno::find($request->ncontrol);
            if ($alumno != null) {
                $calificacion = new Calificacion;
                $calificacion->ncontrol = $request->ncontrol;
                $calificacion->idgrupo = $request->idgrupo;
                $calificacion->calificacion = strtoupper($request->calificacion);
                $calificacion->save();

                return redirect()->route("Calificaciones.index") //with se utilizar para pasar parametros entre
                    ->with([
                        'grupos' => $request->idgrupo, //metodos de un controller
                        'periodos' => $calificacion->grupo->periodo
                    ]);
            }
            return redirect()->route("Calificaciones.index");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    static $calificiones = [
        "seleccione" => "SELECCIONE",
        "EXCELENTE" => "EXCELENTE", "BUENO" => "BUENO", "REGULAR" => "REGULAR",
        "SUFICIENTE" => "SUFICIENTE"
    ];
    public function show($idgrupo)
    {
        $calificaciones = self::$calificiones;
        $periodo = Grupo::find($idgrupo)->periodo;
        return view("calificaciones.create", compact('idgrupo', 'calificaciones', 'periodo'));
        //return "Dentro de calificaciones show() ".$id;

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $calificacion = Calificacion::find($id);
        //return "Dentro de calificaciones edit($calificacion)";
        $calificaciones = self::$calificiones;
        return view("calificaciones.edit", compact('calificacion', 'calificaciones'));
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
        //return Calificacion::find($id);
        $calificacion = Calificacion::find($id);
        $calificacion->calificacion = $request->calificacion;
        $calificacion->save();
        return redirect()->route("Calificaciones.index") //with se utilizar para pasar parametros entre
            ->with([
                'grupos' => $calificacion->idgrupo, //metodos de un controller
                'periodos' => $calificacion->grupo->periodo
            ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $calificacion = Calificacion::find($id);
        $idgrupo = $calificacion->idgrupo;
        $periodo = $calificacion->grupo->periodo;
        $calificacion->delete();
        return redirect()->route("Calificaciones.index") //with se utilizar para pasar parametros entre
            ->with([
                'grupos' => $idgrupo, //metodos de un controller
                'periodos' => $periodo
            ]);
    }
    //Request $request
    /* public function filtrarCal(){
        return "en filtrarCalificaciones";
        //return view('calificaciones.index');
    }*/
}
