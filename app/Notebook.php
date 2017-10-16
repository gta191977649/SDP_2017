<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;



class Notebook extends Model
{
    //
    protected $fillable=['name','hide','deleted','hidden']; //POST Filll

    use SoftDeletes;
    //define releation ship
    public function notes()
    {
        return $this->hasMany("App\Note")->withTrashed();
    }

    public function owner()
    {
        return $this->belongsTo("App\User")->withTrashed();
    }

    public function isHidden(){
        $this->hidden = $this->hide;
        return $this->hidden;
    }

    public function isDeleted(){
        return $this->deleted;
    }

}
