<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Line extends Model
{
    //
    function order(){
        return $this->belongsTo('App\Order');
    }

    protected $fillable = [
        "quantity","valor","name","order_id"
    ];
}
