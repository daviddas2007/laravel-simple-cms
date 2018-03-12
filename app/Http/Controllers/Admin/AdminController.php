<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Model\Menu;
use Validator;
use Auth;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware('auth:admin');

    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
  
    public function showDashboard(){

        return view('backend.dashboard');
    }
}


?>