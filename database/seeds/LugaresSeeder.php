<?php

use Illuminate\Database\Seeder;
use Illumina\Database\Eloquent\Model;
use Faker\Factory as Faker;

class LugaresSeeder extends Seeder
{

    public function run()
    {
        $this->command->info('lugares');
        $faker = Faker::create();


        foreach (range(1,10) as $index) {
	        DB::table('lugares')->insert([
	            'nombre' => $faker->company,
	            'direccion' => $faker->streetAddress,
	            'created_at'=> new DateTime,
	            'updated_at' => new DateTime
	    	]);
        }





    }
}
