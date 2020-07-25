<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::any('/login','TestController@login');
Route::any('/userInfo','TestController@userInfo');
Route::any('/sign','TestController@sign');

Route::post('/user/reg','TextController@reg');
Route::post('/user/login','TextController@login');
Route::get('/user/center','TextController@center');

Route::get('/goods','GoodsController@goods');

//非对称加密
Route::get('test/rsa1','TextController@rsa1');

//签名
Route::get('test/sign','TextController@sign');