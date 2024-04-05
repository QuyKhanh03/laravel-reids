<?php

use App\Models\User;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redis;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    dispatch(new App\Jobs\SendMailJob());
    return view('welcome');
});


Route::get('users', function () {

});


//posts
Route::get('posts', function () {

    $cachedData = Cache::remember('posts', 60, function () {
        return \App\Models\Post::all();
    });
    return $cachedData;

});
