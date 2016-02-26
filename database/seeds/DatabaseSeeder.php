<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    public function run()
    {

    	$this->call(LibrosSeeder::class);
    	$this->call(LugaresSeeder::class);
    	$this->call(Libro_LugarSeeder::class);
    }
}
