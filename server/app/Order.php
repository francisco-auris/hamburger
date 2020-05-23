<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    function user(){
        return $this->belongsTo('App\User');
    }

    function line(){
        return $this->hasMany('App\Line');
    }

    protected $fillable = [
        "data","payment","troco","total","address_id","user_id"
    ];
}
