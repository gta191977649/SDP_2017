<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; //add auth package

class UCPController extends Controller
{
    //
    public function index()
    {
        return view("ucp.index");
    }
    public function profile()
    {
        $user = Auth::user();
        return view("ucp.profile",compact('user'));
    }
}
