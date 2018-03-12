<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Request;
use DB;

class Slidergroup extends Model{



	 protected $table    = 'tbl_slidergroup';
	 //public $timestamps  = true;


	


	public static function insertGroup($request){

       $data       =  $request->all();

       unset($data['_method']);
       unset($data['_token']);
       unset($data['file']);

       static::insert($data);
       return DB::getPdo()->lastInsertId();
      
    }


    public static function updateGroup($request){

        $id         =  $request->id; 
        $data       =  $request->all();

        unset($data['_method']);
        unset($data['_token']);
        unset($data['file']);

        static::where('id', $id)->update($data);
      
       
    }

    
   
}
