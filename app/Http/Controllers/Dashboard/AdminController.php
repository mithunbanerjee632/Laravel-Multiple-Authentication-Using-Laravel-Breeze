<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AdminModel;
use Session;
use Auth;

class AdminController extends Controller
{
    function AdminLoginForm(){
        return view('backend.admin');
    }

    function AdminLogin(Request $request){
       $request->validate([
          'email'=>'required',
          'password'=>'required'
       ]);

       $email = $request->input('email');
       $pass  = $request->input('password');

       if(Auth::guard('admin')->attempt(['email'=>$email,'password'=>$pass])){
           return redirect('/admin/dashboard');
       }else{
        Session::flash('error-msg','Invalid Email and Password!');
        return redirect()->back();
       }


    }

    function AdminLogout(){
        Auth::guard('admin')->logout();
        return redirect('/admin/loginForm');
    }
}
