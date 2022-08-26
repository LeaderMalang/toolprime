<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Rules\ReCaptcha;
use Str;
class AuthenticationController extends Controller
{
   public function showRegister(){
    return view('register');
   }
   public function register(Request $request){
    $rules=[
        'email' => 'required|unique:users,email',
        'full_name' => 'required|string',
        'password' => 'required|confirmed|string|min:6',
        'g-recaptcha-response' => ['required', new ReCaptcha]
    ];
    $request->validate($rules);

    $user = new User([
        'name' => $request->full_name,
        'email' => $request->email,
        'password' => bcrypt($request->password),
        'api_status'=>1,
        'api_key'=> Str::random(40)

    ]);
    if($user->save()){
        event (new \App\Event\UserCreated($user));
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
        'password' => 'required|string|min:6',
        'g-recaptcha-response' => ['required', new ReCaptcha]
    ];
    $request->validate($rules);

    $credentials = request(['email', 'password']);
    if (!Auth::attempt($credentials))
        return redirect()->back()->withErrors(['msg' => 'Email or Password Did not Matched']);
    else if(Auth::user()->account_status==0)
        return redirect()->back()->withErrors(['msg' => 'Your Account Is Deactive']);
    else if(Auth::user()->hasRole('admin'))
        return redirect()->route('admin-home-page');
    else
        return redirect()->route('user-home-page');
   }
   public function logout(){
    Auth::logout();
    return redirect()->route('login.show');
}
}
