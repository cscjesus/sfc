<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carrera extends Model
{
    //indicar que la id no es autoincrementable, de lo contrario
    //se tratara de castear a int
    public $incrementing = false;
     //se coloca tambien el nombre de la migracion
     protected $table = 'carreras';
     //la clave no se llama id, entonces se personaliza
     protected $primaryKey = 'idcarrera';
      
}
