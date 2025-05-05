<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashAdminController extends Controller
{
    public function index(){
        return view('dashboard.admin');
    }

    public function managerIndex(){
        return view('dashboard.manager');
    }

    public function stafIndex(){
        return view('dashboard.staf');
    }
}
