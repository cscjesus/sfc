<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Constancia extends Model
{
    //se coloca tambien el nombre de la migracion
    protected $table = 'constancias';
    //la clave no se llama id, entonces se personaliza
    protected $primaryKey = 'idconstancia';
    //
}
