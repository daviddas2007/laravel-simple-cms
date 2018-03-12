<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\controller;
use Illuminate\Http\Request;
use App\Model\Slidergroup;
use Validator;
use Form;
use DB;
use URL;

class SlidergroupController extends Controller{

    public function __constructor(){

    }



    public function getListings(){

       $lists = Slidergroup::orderBy('created_at')->get();
    
       return view('backend.slider-group.listing',compact('lists'));
    }




    public function getSlidergroup(Request $request){

        $list = Slidergroup::where('id',$request->id)->first();

        return view('backend.slider-group.edit',compact('list'));
    }



    





    public function listSlidergroup(Request $request){

        //DB::enableQueryLog();
    	$aColumns = array('name','slug','width','height','status','created_at');


    	//print_r($request->all());

        



        $iDisplayStart  = $request->iDisplayStart;
        $iDisplayLength = $request->iDisplayLength;
        $iSortCol_0     = $request->iSortCol_0;
        $iSortingCols   = $request->iSortingCols;
        $sSearch        = $request->sSearch;
        $sEcho          = $request->sEcho;

        $action  = '<a href="javascript:void(0);" data-action="EDIT" data-load-to="#response" data-form="#create-sliders" data-href="'.URL::to('admin/sliders/groups/edit/@id').'">
				        <i class="glyphicon glyphicon-edit"></i>
				    </a>';
        $action .= '<a href="javascript:void(0);" data-action="DELETE" data-load-to="#response" data-datatable="#example1" data-href="'.URL::to('admin/sliders/groups/delete/@id').'">
				        <i class="glyphicon glyphicon-trash"></i>
				    </a>';

            


        $total    = Slidergroup::select('*')->count();

        $lists    = Slidergroup::select(DB::raw("name,slug,width,height,status,created_at,REPLACE('$action', '@id', id) as action"));

        

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


  


    public function createSlidergroup(Request $request){

       
        return view('backend.slider-group.create');

    }



    public function insertSlidergroup(Request $request){

    	$validator = Validator::make($request->all(), [
            'name'        => 'required|unique:tbl_slidergroup,name',
        ]);

	    if ($validator->fails()) {


	         $errors = $validator->errors();

	         $message = '';

	         foreach ($errors->all() as $value) {
	                $message  .= $value."<br>";
	         }

	         return response()->json(['message' => $message, 'code' => 'notify','status' => 'error','redirect'=> '']);

	    }




        
        $slug         =   str_slug($request->name);

        $request->request->add(['slug' => $slug ]);


        $group_id      = Slidergroup::insertGroup($request);

        $redirect     =  url("admin/sliders/groups/edit/$group_id");

        $message      =  "Slider group has been created successfully.";     

        return response()->json(['message' => $message, 'code' => 'pop','status' => 'success','redirect'=> $redirect]);

    }

    



    public function updateSlidergroup(Request $request){


        $rules = array(
            'name'        => 'required|unique:tbl_slidergroup,name,'.$request->id,
        );

    	$validator = Validator::make($request->all(), $rules);

	    if ($validator->fails()) {


	         $errors = $validator->errors();

	         $message = '';

	         foreach ($errors->all() as $value) {
	                $message  .= $value."<br>";
	         }

	         return response()->json(['message' => $message, 'code' => 'notify','status' => 'error','redirect'=> '']);

	    }

        
        $slug         =   str_slug($request->name);

        $request->request->add(['slug' => $slug ]);



        Slidergroup::updateGroup($request);

        $group_id      =  $request->id;

        $redirect     =  url("admin/sliders/groups/edit/$group_id");

        $message      =  "Slider group has been updated successfully.";     

        return response()->json(['message' => $message, 'code' => 'pop','status' => 'success','redirect'=> $redirect]);

    }


    public function deleteSlidergroup(Request $request){

    	$group_id      =  $request->id;
  
        Slidergroup::where('id',$group_id)->delete();


        $redirect     =  url("admin/sliders/groups/create");

        $message      =  "Slider group has been deleted successfully.";     

        return response()->json(['message' => $message, 'code' => 'pop','status' => 'success','redirect'=> $redirect]);

    }


    





}



?>