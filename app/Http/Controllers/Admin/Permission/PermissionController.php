<?php

namespace App\Http\Controllers\Admin\Permission;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function index(){
        return view('admin_panel.permission.index');
    }
    public function edit(){
        return view('admin_panel.permission.edit');
    }
    public function list(){
        return view('admin_panel.permission.list');
    }
}
