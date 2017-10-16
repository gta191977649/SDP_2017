<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    //Relationship
    //this will insert user_id to notebooks table by default
    public function setting()
    {
        return $this->hasOne("App\Setting");
    }

    public function notebooks()
    {
        return $this->hasMany(Notebook::class)->withTrashed();
    }
    public function notesTotal()
    {
        $notebooks = $this->notebooks;
        $total = 0;
        foreach($notebooks as $notebook)
        {
            $total += $notebook->notes->count();
        }
        return $total;
    }
    public function deteledTotal()
    {
        $notebooks = $this->notebooks;
        $total = 0;
        foreach($notebooks as $notebook)
        {
            foreach($notebook->notes as $note)
            {
                if($note->trashed()) $total ++;

            }
        }
        return $total;
    }

    public function numHidden(){
        $notebooks =  $this->notebooks->where('hide',1);
        return count($notebooks);
    }

    public function numDeleted(){
        $notebooks = $this->notebooks->where('deleted',1);
        return count($notebooks);
    }

    public function hasHidden(){
        return ($this->numHidden() > 0);
    }

    public function hasDeleted(){
        return ($this->numDeleted() > 0);
    }

    public function hasActiveJournals(){
        $notebooks = $this->notebooks->where('deleted',0);
        return count($notebooks);
    }


}
