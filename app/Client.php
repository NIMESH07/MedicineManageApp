<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = ['user_id','name','mobile_no'];

    function user()
    {
        return $this->belongsTo('users','user_id');
    }
}
