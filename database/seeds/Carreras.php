<?php

use Illuminate\Database\Seeder;

class Carreras extends Seeder
{
    //comando para crear el seeder
    //php artisan make:seeder Carreras
    //despues: composer dump-autoload
    //al final: php artisan db:seed --class=Carreras
    //para ejecutar todos los seeders, llamarlos en DatabaseSeeder
    

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('carreras')->insert([
            ['idcarrera'=>'SELEC', 'nombre'=>'SELECCIONE'],
            ['idcarrera'=>'IE', 'nombre'=>'ING. ELECTROMECÁNICA'],
            ['idcarrera'=>'IGE','nombre'=> 'ING. EN GESTIÓN EMPRESARIAL'],
            ['idcarrera'=>'II','nombre'=> 'ING. INDUSTRIAL'],
            ['idcarrera'=>'IIA','nombre'=> 'ING. EN INDUSTRIAS ALIMENTARIAS'],
            ['idcarrera'=>'IIAS','nombre'=> 'ING. EN INNOVACIÓN AGRÍCOLA SUSTENTABLE'],
            ['idcarrera'=>'ISA','nombre'=> 'ING. EN SISTEMAS AUTOMOTRICES'],
            ['idcarrera'=>'ISC', 'nombre'=>'ING. EN SISTEMAS COMPUTACIONALES']
            ]
        );
    }
}
