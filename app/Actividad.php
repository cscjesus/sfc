<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Actividad extends Model
{
    //indicar que la id no es autoincrementable, de lo contrario
    //se tratara de castear a int
    //public $incrementing = false;

    //se coloca tambien el nombre de la migracion
    protected $table = 'actividades';
    //la clave no se llama id, entonces se personaliza
    protected $primaryKey = 'idactividad';
    
    public function grupos(){
        //la primer idactividad refiere a la fk de Grupo
        //la segunda idactividad refiere a la pk de ActividadS
        return $this->hasMany('App\Grupo','idactividad','idactividad');   
        //return $this->hasMany(App\Grupo::class);   
    }
}
