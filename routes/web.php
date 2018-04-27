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

Route::get('/sms', function (){
    $sms = new \App\Tools\SMS\Sms();
    $sms->sendTemplateSMS('18721186620',['1234','5'], '1');
    return "发送短信";
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
