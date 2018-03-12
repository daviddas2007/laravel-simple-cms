<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Request;
use DB;

class Pages extends Model{



	 protected $table    = 'tbl_pages';
	 public $timestamps  = false;


	


	public static function insertPages($request){

       $data       =  $request->all();

       unset($data['_method']);
       unset($data['_token']);

       static::insert($data);
       return DB::getPdo()->lastInsertId();
      
    }


    public static function updatePages($request){


        $id         =  $request->id; 
        $data       =  $request->all();


        unset($data['_method']);
        unset($data['_token']);



        static::where('id', $id)->update($data);
      
       
  }

    
   
}
