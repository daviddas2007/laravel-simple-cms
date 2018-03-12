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

class SliderSettingsController extends Controller{

    public function __constructor(){

    }

   /**
   * Display a listing of the resource.
   *
   * @return Response
   */
   public function index(){

      return view('backend.sliders.settings.index');
    
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



        $validator = Validator::make($request->all(), [
            'slider_min_width'        => 'nullable|integer',
            'slider_min_height'        => 'nullable|integer',
        ]);

        if ($validator->fails()) {


              return redirect()->back()->withErrors($validator->errors())->withInput($request->all());

        }



        foreach($_POST as $key=>$value){

            
            $setting  = Settings::where('meta_key', $key)->first();
            if (is_null($setting)) {
                Settings::insert(['meta_key' => $key, 'meta_value' => trim($value)]);
            } else {
                Settings::where('meta_key', $key)->update(['meta_value' => trim($value)]);
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


        
        return redirect('admin/sliders/settings')->with('message','Slider settings updated successfully');
    
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