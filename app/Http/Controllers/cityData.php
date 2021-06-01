<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class cityData extends Controller
{
    function getIt(){
        return Http::get('http://127.0.0.1:8000/api/cityData')->body();
    }
}