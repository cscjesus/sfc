<?php

use Illuminate\Database\Seeder;

class Modalidades extends Seeder
{
    //comando para crear el seeder
    //** php artisan make:seeder Modalidades
    
    //despues: composer dump-autoload
    
    //para cargar los datos a la bd de forma individual
    /*** php artisan db:seed --class=Modalidades
    
    //para ejecutar todos los seeders, llamarlos en DatabaseSeeder.php
    
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('modalidades')->insert([
            ['nombre'=>'ESCOLARIZADO'],
            ['nombre'=>'SABATINO']
            ]);
    }
}
