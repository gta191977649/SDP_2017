<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    //
    public function test($param)
    {
    	return "Hello World from controller, and para = ".$param;
    }

}
