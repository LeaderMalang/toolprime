<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthenticationController extends Controller
{
   public function showRegister(){
    return view('admin_panel.register');
   }
   public function register(Request $request){
    return response('Done');
   }

   public function showLogin(){
    return view('admin_panel.login');
   }
}
