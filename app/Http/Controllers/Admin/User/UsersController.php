<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
class UsersController extends Controller
{
    public function index(){
        $users=User::all();
        return view('admin_panel.user.list',[
            'users'=>$users
        ]);
    }
    public function changeApiStatus(Request $request){
        $user_id=$request->user_id;
        $api_status=$request->api_status;
        $user=User::find($user_id);
        if(is_null($user) || !isset($user))
            return response()->json(['success'=>0,'msg'=>"No User Found"]);
        $user->update(['api_status'=>$api_status]);
        if($user->api_status==1)
            return response()->json(['success'=>1,'api_status'=>$user->api_status,'msg'=>"User Api Is Active Now"]);
        else
            return response()->json(['success'=>1,'api_status'=>$user->api_status,'msg'=>"User Api Is Inactive Now"]);
    }
    public function changeAccountStatus(Request $request){
        $user_id=$request->user_id;
        $account_status=$request->account_status;
        $user=User::find($user_id);
        if(is_null($user) || !isset($user))
            return response()->json(['success'=>0,'msg'=>"No User Found"]);
        $user->update(['account_status'=>$account_status]);
        if($user->account_status==1)
            return response()->json(['success'=>1,'account_status'=>$user->account_status,'msg'=>"User Account Is Active Now"]);
        else
            return response()->json(['success'=>1,'account_status'=>$user->account_status,'msg'=>"User Account Is Inactive Now"]);
    }
}
