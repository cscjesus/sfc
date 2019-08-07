<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
    //indicar que la id no es autoincrementable, de lo contrario
    //se tratara de castear a int
    public $incrementing = false;
    //se coloca tambien el nombre de la migracion
    protected $table = 'docentes';
    //la clave no se llama id, entonces se personaliza
    protected $primaryKey = 'iddocente';
    //
    public function grupos(){
        return $this->hasMany('App\Grupo','iddocente','iddocente');
    }
    public function getNombreCompletoAttribute(){
        return $this->nombre." ".$this->ap_pat." ".$this->ap_mat;
        //nombre_completo
    }

}
