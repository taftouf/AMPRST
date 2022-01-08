<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = ['title','start_date','end_date','description'];

    public function getRouteKeyName(){
        return 'title';
    }

    public function users()
    {
        return $this->belongsToMany('App\User');
    }
}