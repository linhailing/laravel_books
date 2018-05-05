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

Route::get('/', 'WelcomeController@index');
Route::get('/detail', 'WelcomeController@detail');

Route::get('/sms', function (){
    $sms = new \App\Tools\SMS\Sms();
    $sms->sendTemplateSMS('18721186620',['1234','5'], '1');
    return "发送短信";
});

Route::get('/code', function (){
    $_vc = new \App\Tools\ValidateCode();  //实例化一个对象
    echo $_vc->doimg();
    return "code";
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
