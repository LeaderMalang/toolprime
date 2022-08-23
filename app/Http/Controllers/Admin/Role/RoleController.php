<?php

namespace App\Http\Controllers\Admin\Role;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index(){
        return view('admin_panel.role.index');
    }
    public function edit(){
        return view('admin_panel.role.edit');
    }
    public function list(){
        return view('admin_panel.role.list');
    }
}
