<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\controller;
use Illuminate\Http\Request;
use App\Model\Settings;
use Validator;
use Form;
use DB;
use URL;
use File;


class SettingsController extends Controller{

    public function __constructor(){

    }

   /**
   * Display a listing of the resource.
   *
   * @return Response
   */
   public function index(){

      return view('backend.settings.global.index');
    
   }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
   public function create(Request $request){

        
      return view('backend.settings.global.create');
    
   }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
   public function store(Request $request){



        foreach($_POST as $key=>$value){

            
            $setting  = Settings::where('meta_key', $key)->first();
            if (is_null($setting)) {
                Settings::insert(['meta_key' => $key, 'meta_value' => $value]);
            } else {
                Settings::where('meta_key', $key)->update(['meta_value' => $value]);
            }


        
        }


        foreach($_FILES as $file_key => $file_value){ 

            $image = $request->file($file_key);
          
            $destinationPath   = base_path() . '/public/uploads/';

            if(!empty($image)){

                $filename  = $image->getClientOriginalName();

                $extension = $image->getClientOriginalExtension(); 

                $filename  = md5($filename).rand(11111,99999).'.'.$extension; 

                $image->move($destinationPath, $filename);


                $setting  = Settings::where('meta_key', $file_key)->value('meta_value');

                if (is_null($setting)) {

                    Settings::insert(['meta_key' => $file_key, 'meta_value' => $filename]);

                } else {

                    File::delete($destinationPath . $setting);
                    Settings::where('meta_key', $file_key)->update(['meta_value' => $filename]);
                }
               
        
           }


                
        }


        
        return redirect('admin/settings/global');
    
   }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
   public function show(Request $request){
      
      return view('backend.settings.global.index');
   }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
   public function edit(Request $request){
    
      return view('backend.settings.global.edit');
   }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
   public function update(Request $request){
    
   }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
   public function destroy(Request $request){
    
   }





}



?>