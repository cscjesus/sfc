<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    //indicar que la id no es autoincrementable, de lo contrario
    //se tratara de castear a int
    public $incrementing = false;
    //se coloca tambien el nombre de la migracion
    protected $table = 'grupos';
    //la clave no se llama id, entonces se personaliza
    protected $primaryKey = 'idgrupo';
    //
    public function calificaciones(){
        return $this->hasMany('App\Calificacion','idgrupo','idgrupo');
    }
    //iddocente se refiere a la fk de Grupo
    public function docente(){
        return $this->belongsTo('App\Docente','iddocente');
    }
    public function actividad(){
        return $this->belongsTo('App\Actividad','idactividad');
    }
}
