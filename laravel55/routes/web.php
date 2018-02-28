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
Route::get('zhuce',function(){
   return view('auth/zhuce');
});
Route::get('test', function () {
    return view('layouts/test');
});

Auth::routes();
//Route::get('navigation','Web/IndexController@index');
Route::get('/home', 'HomeController@index')->name('home');

Route::group(['namespace'=>'Web'],function(){
Route::get('douyin','IndexController@douyin');
Route::post('douyins','IndexController@douyins');
Route::get('url','IndexController@url');
Route::post('shorturl','IndexController@shorturl');
Route::get('bed','IndexController@bed');
Route::get('guide','IndexController@guide'); //引导页

});