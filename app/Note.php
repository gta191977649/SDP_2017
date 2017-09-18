<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Note extends Model
{
    //

    use SoftDeletes;
    protected $fillable=['notebook_id'];
    protected $dates = ['deleted_at'];

    
    public function noterecords()
    {
        return $this->hasMany("App\NoteRecord")->withTrashed();
    }

    public function notebook()
    {
        return $this->belongsTo("App\NoteBook")->withTrashed();
    }
   
    

}
