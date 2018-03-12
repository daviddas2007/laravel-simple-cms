<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\controller;
use Illuminate\Http\Request;
use App\Model\Pages;
use Validator;
use Form;
use DB;
use URL;
use Response;

class PageController extends Controller{

    public function __constructor(){

    }



    public function getListings(){

       $lists = Pages::orderBy('created_at')->get();
    
       return view('backend.pages.listing',compact('lists'));
    }


    


    public function getPages(Request $request){
  
        $list = Pages::where('id',$request->id)->first();

        return view('backend.pages.edit',compact('list'));

    }


    public function listPages(Request $request){

        //DB::enableQueryLog();
    	$aColumns = array('title','heading','status','created_at',);


    	//print_r($request->all());

        



        $iDisplayStart  = $request->iDisplayStart;
        $iDisplayLength = $request->iDisplayLength;
        $iSortCol_0     = $request->iSortCol_0;
        $iSortingCols   = $request->iSortingCols;
        $sSearch        = $request->sSearch;
        $sEcho          = $request->sEcho;

        $action     = '<a href="javascript:void(0);" data-action="EDIT" data-load-to="#response" data-form="#create-pages" data-href="'.URL::to('admin/pages/edit/@id').'">
				            <i class="glyphicon glyphicon-edit"></i>
				        </a>';
        $action     .= '<a href="javascript:void(0);" data-action="DELETE" data-load-to="#response" data-datatable="#example1" data-href="'.URL::to('admin/pages/delete/@id').'">
				             <i class="glyphicon glyphicon-trash"></i>
				        </a>';


        $total          = Pages::select('*')->count();

        $lists          = Pages::select(DB::raw("title,status,created_at,REPLACE('$action', '@id', id) as action"));

        

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


       
        $pages['data']            = $rows;
        $pages['recordsTotal']    = $record;
        $pages['recordsFiltered'] = $total;
        $pages['request']         = $request->all();
 



        return response()->json($pages, 200);



    }


    public function upload(Request $request){

           
        if ($request->hasFile('file')){
        
        
            $image = $request->file('file');
        
            $destinationPath   = base_path() . '/public/uploads/pages/';

           if(!empty($image)){

                $filename = $image->getClientOriginalName();

                $extension = $image->getClientOriginalExtension(); 

                $filename = md5($filename).rand(11111,99999).'.'.$extension; 

                $request->request->add(['image' => $filename ]);

                $image->move($destinationPath, $filename);

                $url = URL::to("public/uploads/pages/$filename");

                return Response::json(array('url' => $url));


                //echo  URL::to("public/uploads/pages/$filename");  die;
               
        
           }
           
                
            

        }
        
    }




    public function createPages(Request $request){

       
        return view('backend.pages.create');

    }



    public function insertPages(Request $request){


    	$validator = Validator::make($request->all(), [
            'title'        => 'required|unique:tbl_pages,title',
            'content'      => 'required',
            'order'        => 'nullable|numeric',
        ]);

	    if ($validator->fails()) {


	         $errors = $validator->errors();

	         $message = '';

	         foreach ($errors->all() as $value) {
	                $message  .= $value."<br>";
	         }

	         return response()->json(['message' => $message, 'code' => 'notify','status' => 'error','redirect'=> '']);

	    }

    	$slug         =   str_slug($request->title);

    	$request->request->add(['slug' => $slug ]);

        $page_id      = Pages::insertPages($request);

        $redirect     =  url("admin/pages/edit/$page_id");

        $message      =  "Page has been created successfully.";     

        return response()->json(['message' => $message, 'code' => 'pop','status' => 'success','redirect'=> $redirect]);

    }

    



    public function updatePages(Request $request){

    	$validator = Validator::make($request->all(), [
            'title'        => 'required|unique:tbl_pages,title,'.$request->id,
            'content'      => 'required',
            'order'        => 'nullable|numeric',
        ]);

	    if ($validator->fails()) {


	         $errors = $validator->errors();

	         $message = '';

	         foreach ($errors->all() as $value) {
	                $message  .= $value."<br>";
	         }

	         return response()->json(['message' => $message, 'code' => 'notify','status' => 'error','redirect'=> '']);

	    }

        $slug         =   str_slug($request->title);

    	$request->request->add(['slug' => $slug ]);

        Pages::updatePages($request);

        $page_id      =  $request->id;

        $redirect     =  url("admin/pages/edit/$page_id");

        $message      =  "Page has been updated successfully.";     

        return response()->json(['message' => $message, 'code' => 'pop','status' => 'success','redirect'=> $redirect]);

    }


    public function deletePages(Request $request){

    	$page_id      =  $request->id;
  
        Pages::where('id',$page_id)->delete();


        $redirect     =  url("admin/pages/create");

        $message      =  "Page has been deleted successfully.";     

        return response()->json(['message' => $message, 'code' => 'pop','status' => 'success','redirect'=> $redirect]);

    }


    





}



?>