<?php

namespace App\Http\Controllers\Front;
use App\Http\Controllers\controller;
use Illuminate\Http\Request;
use App\Model\Pages;
use Validator;
use Form;
use DB;
use URL;
use Route;

class PageController extends Controller{

    public function __constructor(){

    }

   public function index(Request $request){


      $slug  =  $request->path();

      $page  =  Pages::where('status', 'activate')->where('slug', $slug)->first();

      return view('frontend.pages',compact('page'));
    
   }

 



}

?>