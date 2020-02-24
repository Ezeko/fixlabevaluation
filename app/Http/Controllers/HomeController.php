<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function showHome(){
    
            return  response($content = ['message'=>'Connected to server successfully'], $status = 200);
        
    }
}
