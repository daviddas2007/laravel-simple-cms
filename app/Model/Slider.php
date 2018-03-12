<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Request;
use DB;

class Slider extends Model{



	 protected $table    = 'tbl_sliders';
	 public $timestamps  = false;


	


	public static function insertPages($request){

       $data       =  $request->all();

       unset($data['_method']);
       unset($data['_token']);
       unset($data['file']);

       static::insert($data);
       return DB::getPdo()->lastInsertId();
      
    }


    public static function updatePages($request){

        $id         =  $request->id; 
        $data       =  $request->all();

        unset($data['_method']);
        unset($data['_token']);
        unset($data['file']);

        static::where('id', $id)->update($data);
      
       
    }

    
   
}
