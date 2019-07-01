<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Modalidad extends Model
{
    //se coloca tambien el nombre de la migracion
    protected $table = 'modalidades';
    //la clave no se llama id, entonces se personaliza
    protected $primaryKey = 'idmodalidad';
    //
   // public function alumnos(){
   //     return $this->hasMany('App\Alumno','idmodalidad','idmodalidad');
    //}
}
