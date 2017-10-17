<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    //
    public function setSession(Request $req,$data)
    {
        $req->session()->put('Test',$data);
        return "session set Secuess";
    }
    public function getSession(Request $req)
    {
        return $req->session()->get('Test');
        //return "test";
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('index');
    }
}
