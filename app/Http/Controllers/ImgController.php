<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use File;
use Response;

class ImgController extends Controller
{
    //Function that hanles request for the user uploaded image.
    public function getImg($fileName)
    {
        $path = storage_path() . '/app/public/uploads/' . $fileName;
        
         if(!File::exists($path)) abort(404);
     
         $file = File::get($path);
         $type = File::mimeType($path);
     
         $response = Response::make($file, 200);
         $response->header("Content-Type", $type);
         return $response;
    }
}
