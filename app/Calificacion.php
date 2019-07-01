<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Calificacion extends Model
{
    
    //se coloca tambien el nombre de la migracion
    protected $table = 'calificaciones';
    //la clave no se llama id, entonces se personaliza
    protected $primaryKey = 'idcalificacion';
    //
    public function alumno(){
        //ncontrol se refiere al registro de la tabla calificaciones
        return $this->belongsTo('App\Alumno','ncontrol');
    }
    public function grupo(){
        return $this->belongsTo('App\Grupo','idgrupo');
    }
    public function constancias(){
        return $this->hasMany('App\Constancia','idcalificacion','idcalificacion');
    }

}
