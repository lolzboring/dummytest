<?php

use Illuminate\Database\Seeder;

class seed_movie_table extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$movie = [
    		'Iron Man 3',
    		'Captain America',
    		'Beauty and The Beast',
    		'Alice Through the Looking Glasses',
    		'Pirate of The Carribean'
    	];

    	$length = count($movie);

    	for($i=0; $i<$length; $i++){
    		DB::table('movie')->insert([
	            'movie_name' => $movie[$i],
	        ]);

	        for($j=0; $j<10; $j++){
	    		DB::table('movie_show_time')->insert([
	    			'movie_id' => $i+1,
	    			'movie_show_time' => Date('Y-m-d H:i:s' ,mktime($j+10, 0, 0, 15, 10, 2016)),
	    		]);
	    	}
    	}
    }
}
