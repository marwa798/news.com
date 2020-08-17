<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class posts extends Model
{
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function comments ()
    {
        return $this->hasMany('App\comments');
    }
}
