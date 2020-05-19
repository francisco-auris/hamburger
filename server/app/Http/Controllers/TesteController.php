<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TesteController extends Controller
{
    //
    public function teste(){
        return response()->json(
            ['status'=>'tested', 'message'=>'Message of the teste'], 200
        );
    }
}
