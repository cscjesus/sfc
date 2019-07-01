<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home.index');
});
Route::get('about', function () {
    return view('home.about');
    //return"hola mundo";
});
//registrar todas las rutas de AlumnosController
Route::resource('Alumnos','AlumnosController');
//registrar todas las rutas del DocentesController
Route::resource('Docentes','DocentesController');
//registrar rutas
Route::resource('Actividades','ActividadesController');
//Grupos
Route::resource('Grupos','GruposController');
//Calificaciones
Route::resource('Calificaciones','CalificacionesController');
//constancias
Route::resource('Constancias','ConstanciasController');

//Route::post('Alumnos/agregarAlumno/{alumno}','AlumnosController@agregarAlumno'
//, function (App\Alumno $alumno) {return $alumno;}
//);
/*Route::post('Alumnos/agregarAlumno/{alumno}',
 //function (App\Alumno $alumno) {return $alumno;}
 function(){
     dd(Request::all());
}
);*/
Route::get("Grupos/gruposPeriodo/{periodo}","GruposController@retornaGrupos");
Route::get("Calificaciones/{periodo}/{grupo}","CalificacionesController@index");

