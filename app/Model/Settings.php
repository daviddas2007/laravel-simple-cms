<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Request;
use DB;

class Settings extends Model{



	 protected $table    = 'tbl_settings';
	 public $timestamps  = false;


	


	public static function inserts($request){

       $data       =  $request->all();

       unset($data['_method']);
       unset($data['_token']);
       unset($data['file']);

       static::insert($data);
       return DB::getPdo()->lastInsertId();
      
    }


    public static function updates($request){

        $id         =  $request->id; 
        $data       =  $request->all();

        unset($data['_method']);
        unset($data['_token']);
        unset($data['file']);

        static::where('id', $id)->update($data);
      
       
    }

    
   
}
