<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //para ejecutar este metodo despues de la migracion, utilizar el comando
        //*** php artisan db:seed

        //para ejecutar este metodo junto a la migracion
        //*** php artisan migrate --seed
          
        // $this->call(UsersTableSeeder::class);
        $this->call(Carreras::class);
        $this->call(Modalidades::class);
    }
}
