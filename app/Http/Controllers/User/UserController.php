<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Auth;
use App\Rules\MatchOldPassword;
class UserController extends Controller
{
    public function changePassword(Request $request){
        // if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
        //     // The passwords matches
        //     return redirect()->back()->with("error","Your current password does not matches with the password.");
        // }

        // if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
        //     // Current password and new password same
        //     return redirect()->back()->with("error","New Password cannot be same as your current password.");
        // }
        $rules=[
            'current-password' => ['required', new MatchOldPassword],
            'password' => 'required|string|min:8|confirmed',
        ];
        $this->validate($request,$rules);
        dd($request->all());
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();
        return redirect()->back()->with("success","Password successfully changed!");
    }
    public function updateProfile(Request $request){

    }
}
