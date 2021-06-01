<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Post;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
//Route::resource('cityData','PostController');
Route::get('/cityData',function(){
    $post = Post::get([
        'id' ,
        'Person_fname' ,
        'Person_sname',
        'age',
        'Street_no',
        'Street_name',
        'Postal_code',
        'City',
        'Car_brand',
        'Car_color',
        'Car_plate'
    ]);
    return $post;

});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
