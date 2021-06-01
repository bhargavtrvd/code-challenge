<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class cityData1 extends Controller
{
    function getIt(){
       
        return view('city-data');
    }
}
