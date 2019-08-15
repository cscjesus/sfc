<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Modalidad;
class Alumno extends Model
{
    //php artisan make:model Alumno -m

    //indicar que la id no es autoincrementable, de lo contrario
    //se tratara de castear a int
    public $incrementing = false;
    //se coloca tambien el nombre de la migracion
    protected $table = 'alumnos';
    //la clave no se llama id, entonces se personaliza
    protected $primaryKey = 'ncontrol';
    //belongsTo('tablaPadre','claveForanea')
    public function modalidad(){
        return $this->belongsTo('App\Modalidad','idmodalidad');
        //return $this->belongsTo(Modalidad::class);
    }
    public function carrera(){
        return $this->belongsTo('App\Carrera','idcarrera');
        //return $this->belongsTo(Carrera::class);
    }
    public function calificaciones(){
        return $this->hasMany('App\Calificacion','ncontrol','ncontrol');
        //return $this->hasMany(Calificacion::class);
    }

    public function getNombreCompletoAttribute(){
        return $this->nombre." ".$this->ap_pat." ".$this->ap_mat;
        //nombre_completo
    }
}
