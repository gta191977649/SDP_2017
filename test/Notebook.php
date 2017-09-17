<?php

namespace App;

use Illuminate\Database\Eloquent\Model;



class Notebook extends Model
{
    //

    protected $fillable=['name']; //POST Filll
   
    //define releation ship
    public function notes()
    {
        return $this->hasMany("App\Note");
    }
}
