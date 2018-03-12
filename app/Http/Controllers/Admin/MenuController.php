<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Model\Menu;
use Validator;


class MenuController extends Controller{
	

  public function __constructor(){

      $this->middleware('guest:admin');
  
  }


   

  public function getListings(Request $request){

    

   	  $menuSlug   =  (!empty($request->slug))?$request->slug:''; 
   	  $menuGroup  =  Menu::whereParentId(0)->orderBy('order')->orderBy('id')->get(); 
      $items      =  array();
      $menuDetail =  array();

      if($menuSlug == "create"){
         $menuDetail =  Menu::where('parent_id',0)->first();
      }else if($menuSlug){ 
         $menuDetail =  Menu::where('parent_id',0)->where('slug',$menuSlug)->first();
      }else{ 
         $menuDetail =  Menu::where('parent_id',0)->first();  
      }

      $menuGroup_id = (!empty($menuDetail))?$menuDetail->id:0;
 
      $items        =  Menu::tree($menuGroup_id); 
  

     	return view('backend.menus.listing',compact('menuGroup', 'menuSlug','items','menuDetail'));

  
  }




  




  
  public function getmenu(Request $request){
        
        $menuId   =  $request->menuId; 

        $menuDetail =  Menu::where('id',$menuId)->first();

        return view('backend.menus.menu.update',compact('menuDetail'));
  }





  public function getSubmenu(Request $request){
        
        $menuId     =  $request->menuId; 
        $menuDetail =  Menu::where('id',$menuId)->first();
        $ansestor   =  Menu::ansestor($menuId);

        if(!empty($ansestor)){
          $menuDrop   =  Menu::dropdown($ansestor[0]->id);
        }else{
          $menuDrop   =  Menu::dropdown(1);
        }

        return view('backend.menus.submenu.update',compact('menuDetail','menuDrop','ansestor'));
  }





  public function createSubmenu(Request $request){

        $menuSlug   =  $request->slug; 

        $menuDetail =  Menu::where('parent_id',0)->where('slug',$menuSlug)->first();

        $menuGroup  =  $menuDetail->id;

        $dropdown    = Menu::dropdown($menuGroup); 
      
        return view('backend.menus.submenu.create',compact('dropdown','menuSlug','menuGroup','menuDetail'));
  }



   

  public function insertMenu(Request $request){


      $validator = Validator::make($request->all(), [
            'name' => 'required|unique:tbl_menus',
            'key'  => 'required|unique:tbl_menus',
        ]);

      if ($validator->fails()) {


         $errors = $validator->errors();

         $message = '';

         foreach ($errors->all() as $value) {
                $message  .= $value."<br>";
         }

         return response()->json(['message' => $message, 'code' => 'notify','status' => 'error','redirect'=> '','tree'=> '','menu' => '']);

      }

        $request->request->add(['slug' => str_slug($request->name)]);


        
        $menuId   = Menu::insertMenu($request); 
        $menuSlug = $request->slug;  

        $menuDetail   =  Menu::where('id',$menuId)->first();

        $redirect     =  ($menuDetail->parent_id == 0)? url("admin/menu/$menuId") : url("admin/menu/$menuSlug/submenu/$menuId");

        $ansestor     =  Menu::ansestor($menuId);

        $slug         =  (!empty($ansestor)) ? $ansestor[0]->slug :'';

        $menu         =  (!empty($ansestor)) ? $ansestor[0]->name :'';

        $tree         =  (!empty($ansestor)) ? url("admin/menu/tree/$slug") : '';

        $message      =  ($menuDetail->parent_id == 0)?"Menu has been created successfully.":"Sub Menu has been created successfully.";     

        return response()->json(['message' => $message, 'code' => 'pop','status' => 'success','redirect'=> $redirect,'tree'=> $tree,'menu' => $menu]);
  }

  

  public function insertSubmenu(Request $request){


        $menuId   = Menu::insertMenu($request); 
        $menuSlug = $request->slug; 


        $menuDetail   =  Menu::where('id',$menuId)->first();

        $redirect     =   ($menuDetail->parent_id == 0)? url("admin/menu/$menuId") : url("admin/menu/$menuSlug/submenu/$menuId");

        $ansestor     =  Menu::ansestor($menuId);

        $slug         =  (!empty($ansestor)) ? $ansestor[0]->slug :'';

        $menu         =  (!empty($ansestor)) ? $ansestor[0]->name :'';

        $tree         =  (!empty($ansestor)) ? url("admin/menu/tree/$slug") : '';

        $message      =  ($menuDetail->parent_id == 0)?"Menu has been created successfully.":"Sub Menu has been created successfully.";     

        return response()->json(['message' => $message, 'code' => 'pop','status' => 'success','redirect'=> $redirect,'tree'=> $tree,'menu' => $menu]);
  }

   

  public function updateMenu(Request $request){

        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:tbl_menus,name,'.$request->menuId,
            'key'  => 'required|unique:tbl_menus,key,'.$request->menuId,
        ]);

        if ($validator->fails()) {


           $errors  = $validator->errors();

           $message = '';

           foreach ($errors->all() as $value) {
                  $message  .= $value."<br>";
           }

           return response()->json(['message' => $message, 'code' => 'notify','status' => 'error','redirect'=> '','tree'=> '','menu' => '']);

        }
 
        $request->request->add(['slug' => str_slug($request->name)]);

        $menuId   =  $request->menuId; 
        $menuSlug =  $request->slug; 

        $menuDetail =  Menu::where('id',$menuId)->first();

        Menu::updateMenu($request); 

        $redirect     =   ($menuDetail->parent_id == 0)? url("admin/menu/$menuId") : url("admin/menu/$menuSlug/submenu/$menuId");

        $ansestor     =  Menu::ansestor($menuId);

        $slug         =  (!empty($ansestor)) ? $ansestor[0]->slug :'';

        $menu         =  (!empty($ansestor)) ? $ansestor[0]->name :'';

        $tree         =  (!empty($ansestor)) ? url("admin/menu/tree/$slug") : '';

        $message      =  ($menuDetail->parent_id == 0)?"Menu has been updated successfully.":"Sub Menu has been updated successfully.";      

        return response()->json(['message' => $message, 'code' => 'pop','status' => 'success','redirect'=> $redirect,'tree'=> $tree,'menu' => $menu]);

      

  }



  public function updateSubmenu(Request $request){

        $menuId   =  $request->menuId; 
        $menuSlug = $request->slug; 

        $menuDetail =  Menu::where('id',$menuId)->first();

        Menu::updateMenu($request); 

        $redirect     =   ($menuDetail->parent_id == 0)? url("admin/menu/$menuId") : url("admin/menu/$menuSlug/submenu/$menuId");

        $ansestor     =  Menu::ansestor($menuId);

        $slug         =  (!empty($ansestor)) ? $ansestor[0]->slug :'';

        $menu         =  (!empty($ansestor)) ? $ansestor[0]->name :'';

        $tree         =  (!empty($ansestor)) ? url("admin/menu/tree/$slug") : '';

        $message      =  ($menuDetail->parent_id == 0)?"Menu has been updated successfully.":"Sub Menu has been updated successfully.";      

        return response()->json(['message' => $message, 'code' => 'pop','status' => 'success','redirect'=> $redirect,'tree'=> $tree,'menu' => $menu]);

      

  }


  public function deleteMenu(Request $request){

     $menuId        =  $request->menuId; 

     $menuDetail    =  Menu::where('id',$menuId)->first();

     $ansestor      =  Menu::ansestor($menuId);

     $items         =  Menu::deleteTree($menuId); 

     $redirect      =  (!empty($ansestor)) ? url("admin/menu/{$ansestor[0]->id}") : '';

     $slug          =  (!empty($ansestor)) ? $ansestor[0]->slug :'';

     $menu          =  (!empty($ansestor)) ? $ansestor[0]->name :'';

     $tree          =  (!empty($ansestor)) ? url("admin/menu/tree/$slug") : '';

     $message       =  "Menu has been deleted successfully.";      

     return response()->json(['message' => $message, 'code' => 'pop','status' => 'success','redirect'=> $redirect,'tree'=> $tree,'menu' => $menu]);


  }

  public function updateMenuTree(Request $request){

        
        $menuSlug   =  $request->slug; 
        $menuId     =  $request->menuId; 
        $menuTree   =  $request->tree; 


        Menu::updateTree($menuId,$menuTree);


        //print_r($menuSlug3);


  }



  public function getTree(Request $request){

       $slug         =  $request->slug;     
       
       $menuDetail   =  Menu::where('parent_id',0)->where('slug',$slug)->first();

       $menuGroup_id = $menuDetail->id;

       $items        =  Menu::tree($menuGroup_id); 

       return view('backend.menus.tree',array('items' => $items));
  }



  public static function getUserMenu($slug){
 
       
       $menuDetail   =  Menu::where('parent_id',0)->where('slug',$slug)->first();

       $menuGroup_id = $menuDetail->id;

       $items        =  Menu::tree($menuGroup_id); 

       return view('backend.menus.user.tree',array('items' => $items));
  }





  public function nesting($id = 0){

   	  $nesting    =  Menu::getMenu($id);

      return view('backend.menus.nesting',array('nesting' => $nesting));
   	 
  }


  



}



?>