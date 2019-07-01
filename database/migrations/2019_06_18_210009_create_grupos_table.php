<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGruposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grupos', function (Blueprint $table) {
            $table->string('idgrupo',20)->primary();
            $table->string('periodo',10);
            $table->integer('semestre');
            $table->integer('iddocente');
            $table->foreign('iddocente')->references('iddocente')->on('docentes')->onDelete('cascade');
            $table->integer('idactividad')->unsigned();//si no se coloca, marca error
            $table->foreign('idactividad')->references('idactividad')->on('actividades')->onDelete('cascade');
            $table->string('idcarrera',5);
            $table->timestamps();
            //https://coderwall.com/p/o73fbq/creating-foreign-key-in-laravel-migrations
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('grupos');
    }
}
