<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index(){
        return view('admin_panel.user.index');
    }
    public function edit(){
        return view('admin_panel.user.edit');
    }
    public function list(){
        return view('admin_panel.user.list');
    }
}
