<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCalificacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calificaciones', function (Blueprint $table) {
            $table->increments('idcalificacion');
            $table->string('calificacion',20);
            $table->string('ncontrol',10);
            $table->foreign('ncontrol')->references('ncontrol')->on('alumnos')->onDelete('cascade');
            $table->string('idgrupo',20);
            $table->foreign('idgrupo')->references('idgrupo')->on('grupos')->onDelete('cascade');
            $table->timestamps();
        });

       /* Schema::table('calificaciones',function($table){
            $table->foreign('ncontrol')//ncontrol de la tabla calificaciones
            ->references('ncontrol')//ncontrol de la tabla
             //alumnos debe ser 'unique()' o 'primary()'
            ->on('alumnos')//tabla alumnos
            ->onDelete('cascade');
        });*/

        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('calificaciones');
    }
}
