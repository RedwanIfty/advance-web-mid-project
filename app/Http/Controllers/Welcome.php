<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Welcome extends Controller
{
    function welcome(){
        return view('includes.topbar');
    }
}
