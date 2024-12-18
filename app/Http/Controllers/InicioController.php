<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InicioController extends Controller
{
    public function inicio()
    {
        return view('users.index');   
    }
    public function dashboard(){
        return view('admin.dashboard');
    }
}
