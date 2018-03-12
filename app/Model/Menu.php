<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Request;
use DB;

class Menu extends Model{


	protected $table = 'tbl_menus';

	public static $temp;


	public function model(){

        return 'tbl_menu';
  }



  public function parent() {

        return $this->hasOne('App\Model\Menu', 'id', 'parent_id');

  }

  public function children() {

        return $this->hasMany('App\Model\Menu', 'parent_id', 'id');

  }  

  public static function tree($id = 0) {

        return static::with(implode('.', array_fill(0, 4, 'children')))->where('parent_id', '=', $id)->orderBy('order', 'ASC')->get();

  }


  



  public static function ansestor($id = 0) {

       $sql  = "SELECT T2.* FROM ( SELECT @r AS _id, (SELECT @r := parent_id FROM tbl_menus WHERE id = _id) AS parent_id, @l := @l + 1 AS lvl FROM 
       (SELECT @r := :id, @l := 0) vars, tbl_menus m WHERE @r <> 0) T1 JOIN tbl_menus T2 ON T1._id = T2.id ORDER BY T1.lvl DESC LIMIT 0,1";

       return  $results = DB::select($sql, ['id' => $id]);
  }





  public static function dropdown($id = 0) {


        $data =  static::tree($id)->toArray();
        return  self::flattenDown($data);

  }




  public static function flattenDown($data,$index=0) {

     
      $elements = [];
      foreach($data as $key => $element) {


          $id   = $element['id'];
          $name = str_repeat('---', $index) . $element['name'];

          $elements[] = array('id'=> $id,'name'=> $name);

          if(!empty($element['children'])){

              $elements = array_merge($elements,self::flattenDown($element['children'], $index+1));

          } 
      }

      return $elements;
  }


    



	public static function getSubmenu($parent){	
		
		$menu =  Menu::whereParentId($parent)->get();

		return $menu;
		
	}


    
  public static function insertMenu($request){

       $menuId     =  $request->menuId; 
       $data       =  $request->all();


       unset($data['_method']);
       unset($data['_token']);

       static::insert($data);
       return DB::getPdo()->lastInsertId();
      
  }


  public static function updateMenu($request){


        $menuId     =  $request->menuId; 
        $data       =  $request->all();


        unset($data['_method']);
        unset($data['_token']);



        static::where('id', $menuId)->update($data);
      
       
  }

    
  public static function deleteTree($id){

        $parent_id = static::where('id', $id)->value('parent_id');

        static::where('parent_id', $id)->update(['parent_id' => $parent_id]);

        static::where('id', $id)->delete();
           

  }   


  public static function updateTree($id, $json){

        $tree        = json_decode($json, true);
        self::$temp  = [];


        self::getParentChild($id, $tree);


        foreach (self::$temp as $parent => $children) { 
          
            foreach ($children as $key => $val) {

                static::where('id', $val)->update(['parent_id' => $parent, 'order' => $key]);
            }

        }

  }

  public static function getParentChild($id, $array = array()){


        foreach ($array as $node) {
            self::$temp[$id][] = array_get($node, 'id');

            if (isset($node['children'])) {
                self::getParentChild(array_get($node, 'id'), $node['children']);
            }

        }

  }


    
}
