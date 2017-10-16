<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;



class Notebook extends Model
{
    //
    protected $fillable=['name','hidden','deleted']; //POST Filll

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
        return !$this->hidden;
    }

    public function isDeleted(){
        return $this->deleted;
    }

}
