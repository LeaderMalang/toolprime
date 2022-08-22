<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthenticationController extends Controller
{
   public function showRegister(){
    return view('register');
   }
   public function register(Request $request){
    $rules=[
        'email' => 'required|unique:users,email',
        'full_name' => 'required|string',
        'password' => 'required|confirmed|string|min:6'
    ];
    $request->validate($rules);

    $user = new User([
        'name' => $request->full_name,
        'email' => $request->email,
        'password' => bcrypt($request->password),

    ]);
    if($user->save()){
        $msg=['result'=>1,'message'=>"Successfully Registered Account !"];
        return redirect()->route('login.show')->with($msg);
    }else {
        $msg=['result'=>0,'message'=>"Internal Server Error Please Try Again Later!"];
        return redirect()->back()->withErrors($msg);
    }
   }

   public function showLogin(){
    return view('login');
   }

   public function login(Request $request){
    $rules=[
        'email' => 'required|email',
        'password' => 'required|string|min:6'
    ];
    $request->validate($rules);

    $credentials = request(['email', 'password']);
    if (!Auth::attempt($credentials))
        return redirect()->back()->withErrors(['msg' => 'Username or Password Did not Matched']);


    return redirect()->route('home-page');
   }
}
