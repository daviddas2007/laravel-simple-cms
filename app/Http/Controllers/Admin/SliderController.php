<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\controller;
use Illuminate\Http\Request;
use App\Model\Slider;
use App\Model\Slidergroup;
use Validator;
use Form;
use DB;
use URL;
use Illuminate\Support\Facades\Storage;
use File;
use Image;

class SliderController extends Controller{

    public function __constructor(){

    }



    public function getListings(){

      
       $groups =  Slidergroup::where('status', 'activate')->orderBy('name')->pluck('name', 'id')->toArray();   
       return view('backend.sliders.listing',compact('groups'));
    }



    public function createSliders(Request $request){

        $groups =  Slidergroup::where('status', 'activate')->orderBy('name')->pluck('name', 'id')->toArray();   

        return view('backend.sliders.create',compact('groups'));

    }




    public function getSliders(Request $request){

        $list   =  Slider::where('id',$request->id)->first();
        $groups =  Slidergroup::where('status', 'activate')->orderBy('name')->pluck('name', 'id')->toArray();   
        return view('backend.sliders.edit',compact('list','groups'));
    }



    





    public function listSliders(Request $request){

        //DB::enableQueryLog();
    	$aColumns = array('title','image','group','status','created_at');


    	//print_r($request->all());

        



        $iDisplayStart  = $request->iDisplayStart;
        $iDisplayLength = $request->iDisplayLength;
        $iSortCol_0     = $request->iSortCol_0;
        $iSortingCols   = $request->iSortingCols;
        $sSearch        = $request->sSearch;
        $sEcho          = $request->sEcho;

        $edit_url       = URL::to('admin/sliders/edit/@id');
        $delete_url     = URL::to('admin/sliders/delete/@id');

        $action  = '<a href="javascript:void(0);" data-action="EDIT" data-load-to="#response" data-form="#create-sliders" data-href="'.$edit_url.'">
				        <i class="glyphicon glyphicon-edit"></i>
				    </a>';
        $action .= '<a href="javascript:void(0);" data-action="DELETE" data-load-to="#response" data-datatable="#example1" data-href="'.$delete_url.'">
				        <i class="glyphicon glyphicon-trash"></i>
				    </a>';

        $image   =  '<img src="'.URL::to('public/uploads/sliders/@image').'" class="img-thumbnail" alt="Slider" width="120" height="100">';             


        $total          = Slider::select('*')->count();

        $lists          = Slider::select(DB::raw("tbl_sliders.title,REPLACE('$image', '@image', tbl_sliders.image) as image,name as `group`,tbl_sliders.status,
                          tbl_sliders.created_at,REPLACE('$action', '@id', tbl_sliders.id) as action"))
                          ->leftjoin("tbl_slidergroup",'tbl_slidergroup.id','=','tbl_sliders.group_id');

        

        if(isset($iSortCol_0)){
				
                for($i=0; $i<intval($iSortingCols); $i++){


                	    $iSortCol  = $request->input('iSortCol_'.$i);
                	    $bSortable = $request->input('bSortable_'.intval($iSortCol));
                	    $sSortDir  = $request->input('sSortDir_'.$i);

                        if($bSortable == 'true'){

                        	 $lists->orderBy($aColumns[intval($iSortCol)],$sSortDir);
                           
                        }
                }
        }


  


        if(isset($sSearch) && !empty($sSearch)){
				
                for($i=0; $i<count($aColumns); $i++){

                        $bSearchable = $request->input('bSearchable_'.$i); 

                        if(isset($bSearchable) && $bSearchable == 'true'){

                        	$lists->orWhere($aColumns[$i], 'like', '%' . $sSearch. '%');
                              
                        }
                }
        }

        if(isset($iDisplayStart) && $iDisplayLength != '-1'){

            $lists->take($iDisplayLength)->skip($iDisplayStart);
			
        }


       

        $rows   = $lists->get()->toArray(); 

        $record = $lists->count();    


       
        $sliders['data']            = $rows;
        $sliders['recordsTotal']    = $record;
        $sliders['recordsFiltered'] = $total;
        $sliders['request']         = $request->all();
 



        return response()->json($sliders, 200);



    }


  


    



    public function insertSliders(Request $request){

        $dimensions =  $this->getDimensions($request);
        $img_types  =  $this->getImageTypes();

    	$validator = Validator::make($request->all(), [
            'title'        => 'required|unique:tbl_sliders,title',
            'order'        => 'nullable|numeric',
            'file'         => "required|image|$img_types|$dimensions",
        ]);

	    if ($validator->fails()) {


	         $errors = $validator->errors();

	         $message = '';

	         foreach ($errors->all() as $value) {
	                $message  .= $value."<br>";
	         }

	         return response()->json(['message' => $message, 'code' => 'notify','status' => 'error','redirect'=> '']);

	    }




        if ($request->hasFile('file')){
        
        
                $image = $request->file('file');

 
                $images_path       = config('image.slider_dir'); 

                $destinationPath   = public_path("$images_path/");
                $thumbnailPath     = public_path("{$images_path}/thumbs/");
   
               if(!empty($image)){

                    $filename  = $image->getClientOriginalName();
    
                    $extension = $image->getClientOriginalExtension(); 
    
                    $filename  = md5($filename).rand(11111,99999).'.'.$extension; 

                    $request->request->add(['image' => $filename ]);
 
                    $image->move($destinationPath, $filename);

                    $this->generateThumb($request);

            
               }
           
                
            

        }




        $slider_id    =  Slider::insertPages($request);

        $redirect     =  url("admin/sliders/edit/$slider_id");

        $message      =  "Slider has been created successfully.";     

        return response()->json(['message' => $message, 'code' => 'pop','status' => 'success','redirect'=> $redirect]);

    }





    public function getDimensions($request){

            $group_id   =  $request->group_id;
            $width      =  Slidergroup::where('id',$group_id)->value('width');
            $height     =  Slidergroup::where('id',$group_id)->value('height');

            $min_width   =  getSetting('slider_min_width');
            $min_height  =  getSetting('slider_min_height');


            $dimensions  = "";

            if($width OR $height){


                if($width AND $height){

                    $dimensions  = "dimensions:min_width=$width,min_height=$height";

                }else if($min_width){
                    
                    $dimensions  = "dimensions:min_width=$width";

                }else if($min_height){   

                    $dimensions  = "dimensions:min_height=$height"; 

                }


            }else{



                if($min_width AND $min_height){

                    $dimensions  = "dimensions:min_width=$min_width,min_height=$min_height";

                }else if($min_width){
                    
                    $dimensions  = "dimensions:min_width=$min_width";

                }else if($min_height){   

                    $dimensions  = "dimensions:min_height=$min_height"; 

                }




            }


           
         return  $dimensions;

    }




    public function getImageUnlink($request){

          
          $slider_id    =  $request->id;
          $image        =  Slider::where('id',$slider_id)->value('image');
          $unlink_image =  getSetting('slider_image_update');


          if($image  && $unlink_image){

             $link = public_path("uploads/sliders/$image");
             File::delete($link);

          }

           

          return true;


    }



    public function getImageTypes(){


            $image_types   =  getSetting('slider_image_types');


            if($image_types)
                   
                   return "mimes:$image_types";
            else

                   return "mimes:jpeg,jpg,bmp,png,gif";

    }



    public function generateThumb($request,$type = "fit"){

         $images_path    = config('image.slider_dir'); 
         $filename       = $request->image;
         $image          = Image::make(public_path("{$images_path}/{$filename}"));
         $thumbnailPath  = public_path("{$images_path}/thumbs/");
         
         $group_id       =  $request->group_id;
         $width          =  Slidergroup::where('id',$group_id)->value('thumb_width');
         $height         =  Slidergroup::where('id',$group_id)->value('thumb_height');

         if($width && $height){

             switch ($type) {

                    case "fit": {
                        $image->fit($width, $height, function ($constraint) {
                            $constraint->upsize();
                        });
                        break;
                    }
                    case "resize": {
                       
                        $image->resize($width, $height);
                    }
                    case "background": {

                        $image->resize($width, $height, function ($constraint) {
                            $constraint->aspectRatio();
                            $constraint->upsize();
                        });
                    }
                    case "resizeCanvas": {

                        $image->resizeCanvas($width, $height, 'center', false, 'rgba(0, 0, 0, 0)'); 

                    }
            }

            $image->save($thumbnailPath.$filename);


        }

        return true;


    }





    



    public function updateSliders(Request $request){


        $dimensions =  $this->getDimensions($request);
        $img_types  =  $this->getImageTypes();


        $rules = array(
            'title'        => 'required|unique:tbl_sliders,title,'.$request->id,
            'order'        => 'nullable|numeric',
        );

        if ($request->hasFile('file')){
             $rules['file'] = "required|image|$img_types|$dimensions";
        }

    	$validator = Validator::make($request->all(), $rules);

	    if ($validator->fails()) {


	         $errors = $validator->errors();

	         $message = '';

	         foreach ($errors->all() as $value) {
	                $message  .= $value."<br>";
	         }

	         return response()->json(['message' => $message, 'code' => 'notify','status' => 'error','redirect'=> '']);

	    }

        if ($request->hasFile('file')){
        
        
                $image = $request->file('file');
            
                $images_path       = config('image.slider_dir'); 

                $destinationPath   = public_path("{$images_path}/");
                $thumbnailPath     = public_path("{$images_path}/thumbs/");

               if(!empty($image)){

                    $filename = $image->getClientOriginalName();
    
                    $extension = $image->getClientOriginalExtension(); 
    
                    $filename = md5($filename).rand(11111,99999).'.'.$extension; 

                    $request->request->add(['image' => $filename ]);
  
                    $image->move($destinationPath, $filename);

                    $this->generateThumb($request);

                    $this->getImageUnlink($request);
                   
            
               }
           
                
            

        }



        Slider::updatePages($request);

        $slider_id      =  $request->id;

        $redirect     =  url("admin/sliders/edit/$slider_id");

        $message      =  "Slider has been updated successfully.";     

        return response()->json(['message' => $message, 'code' => 'pop','status' => 'success','redirect'=> $redirect]);

    }


    public function deleteSliders(Request $request){

    	$slider_id      =  $request->id;
  
        Slider::where('id',$slider_id)->delete();


        $redirect     =  url("admin/sliders/create");

        $message      =  "Slider has been deleted successfully.";     

        return response()->json(['message' => $message, 'code' => 'pop','status' => 'success','redirect'=> $redirect]);

    }



    


    





}



?>