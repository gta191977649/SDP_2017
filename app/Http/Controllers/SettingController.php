<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; //add auth package
use App\Setting;
class SettingController extends Controller
{
    //
    public function index()
    {
        return view("ucp.setting.index");
    }

    public function applyTheme(Request $req)
    {
        $setting = $req->all();
        $user = Auth::user();
        
        
        $record = Setting::updateOrCreate(
            ["user_id" => $user->id],
            ["theme" => $setting["theme"]]
        );
        $record->save();
        return view("ucp.setting.index");
    }
}
