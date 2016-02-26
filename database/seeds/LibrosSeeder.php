<?php

use Illuminate\Database\Seeder;
use Illumina\Database\Eloquent\Model;

use Faker\Factory  as Faker;

class LibrosSeeder extends Seeder
{

    public function run()
    {
        $this->command->info('libros');
        $faker = Faker::create();

        foreach (range(1,10) as $index) {
	        DB::table('libros')->insert([
	            'isbn' => $faker->isbn10,
	            'titulo' => $faker->sentence($nbWords = 6, $variableNbWords = true),
	            'autor' => $faker->name($gender = null|'male'|'female'),
	            'cantidad' => $faker->randomDigit,
	            'created_at'=> new DateTime,
	            'updated_at' => new DateTime
	    	]);
        }
    }
}
