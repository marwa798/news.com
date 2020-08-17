<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class comments extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function post()
    {
        return $this->belongsTo('App\posts');
    }
}
