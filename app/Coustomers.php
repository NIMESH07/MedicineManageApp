<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coustomers extends Model
{
    protected $fillable = [
        'name', 'mobile_no', 'address','status',
    ];

}
