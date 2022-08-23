<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    function index() {
        return view('admin_panel.index');
    }
    function profile() {
        return view('admin_panel.profile.index');
    }
}