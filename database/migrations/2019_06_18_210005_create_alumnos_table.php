<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlumnosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumnos', function (Blueprint $table) {
            //$table->string('ncontrol',10)->unique();
            $table->string('ncontrol',10)->primary();//para que se mysql la reconozca como pk
            $table->string('nombre',50);
            $table->string('ap_pat',50);
            $table->string('ap_mat',50);
            $table->string('password',40);
            $table->integer('idmodalidad');
            $table->string('idcarrera',5);
            $table->timestamps();

            //return $this->hasMany('App\Calificacion','ncontrol','ncontrol');
            

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alumnos');
    }
}
