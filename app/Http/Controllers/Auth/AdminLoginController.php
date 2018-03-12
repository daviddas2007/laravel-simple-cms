<?php

namespace App\Http\Controllers\auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;


class AdminLoginController extends Controller{

    public function __construct(){

      $this->middleware('guest:admin',['except' => ['logout']]);

    }

    public function showLoginForm(){

      return view('backend.auth.login');

    }

    public function login(Request $request){

      $field = filter_var($request->input('email'), FILTER_VALIDATE_EMAIL) ? 'email' : 'username';



       
      $this->validate($request, [
        'email'   => 'required',
        'password' => 'required|min:6'
      ]);


  
      if (Auth::guard('admin')->attempt([$field => $request->email, 'password' => $request->password], $request->remember)) {
         return redirect()->intended(route('admin.dashboard'));
      }
      return redirect()->back()->with('message',$field.' and/or Password are not matching!')->withInput($request->only('email', 'remember'));
    }


    public function logout(){

        Auth::guard('admin')->logout();
 
        return redirect('/admin');
    }
}

