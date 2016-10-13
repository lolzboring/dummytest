<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class MovieController extends Controller
{
	//for simplicity I didnt use Model to get data, I'm use DB instead
    public function show()
    {
    	$data['movies'] = DB::table('movie')
    		->select()
    		->get();

    	return view('showMovie',$data);
    }

    public function getMovieDetail()
    {
    	if(isset($_POST['id'])){
    		return DB::table('movie_show_time')->where('movie_id',$_POST['id'])->get();
    	}
    	//if couldn't find $_POST['id'] return error
    	// return "missing $_POST['id']";
    }

    public function insertMovieRecord()
    {
    	// try make precaution to prevent insert twice when refresh page 

    	$movieSeat = 'A6' ; // assume you have get your movie seat too, lazy to create view to select seat le, Gambateh!! xDD
    	$userId = '5'; //I assume you have your user login and get your user id XD

    	if(isset($_POST['movieId']) && isset($_POST['showTime'])){
    		
    		//in this way you can clearly see and control what data will be insert into db
    		$value = [
    			'movie_seat' 	=> $movieSeat,
    			'movie_id' 		=> $_POST['movieId'],
    			'show_time_id' 	=> $_POST['showTime'],
    			'user_id' 		=> $userId,
    			'created_at'	=> Date('Y-m-d H:i:s');
    		];

    		if (DB::table('seat_record')->insert($value)){
    			dd('insert succesful');
    		}else{
    			dd('failed to insert');
    		}
    	}
    }

    public function showRecordTable()
    {
    	$results = DB::table('seat_record')
    		->join('movie', 'seat_record.movie_id','=','movie.id')
    		->join('movie_show_time', 'seat_record.show_time_id','=','movie_show_time.id')
    		->select('seat_record.id', 'movie_name', 'movie_show_time', 'user_id', 'movie_seat')
    		->orderBy('seat_record.id','DESC')
    		->get();

    	$data['results'] = $results;
    	return view('movie_records',$data);
    }
}