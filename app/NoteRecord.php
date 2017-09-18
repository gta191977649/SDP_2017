<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NoteRecord extends Model
{
    //

    protected $table = 'noterecords';
    
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = ['title','body','note_id'];

    

    public function note()
    {
        return $this->belongsTo("App\Note")->withTrashed();
    }


}
