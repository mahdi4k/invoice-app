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

use App\FactoryPipe;
use App\order;
use App\User;

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home', function () {
    return redirect('/');
});
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::get('adminCP', 'Admin\PanelController@AdminLogin');

Route::get('/', 'IndexController@index')->name('home');
Route::get('/pipes/{fac}/{pipe}', 'PipeController@index');
Route::get('/showOrder', 'OrderController@store');
Route::get('/user/active/email/{token} ', 'IndexController@activation')->name('activation.account');
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

//---user routes---
Route::get('/UserOrder','UserController@userOrder')->middleware('auth');
Route::get('/orders/{id}','UserController@show')->middleware('auth');
//user_edit
Route::get('user/edit/{user}', 'UserController@edit')->name('users.edit');
Route::patch('user/update/{user}','UserController@update')->name('users.update');
//send message
Route::get('user/message', 'UserController@messageForm') ;
Route::post('user/send','UserController@messageSend') ;
//---end user route---

Route::group(['namespace' => 'Admin' , 'middleware' => ['checkAdmin'], 'prefix' => 'admin'],function (){
    Route::get('/panel', 'PanelController@index')->name('panel');
    Route::resource('factoryPipe', 'FactoryPipeController');
    Route::resource('Pipe', 'PipeController');
    Route::post('subPipe','PipeController@subPipe')->name('subPipe');
    Route::get('user', 'PanelController@ManageUsers');
    Route::get('/orders','OrderController@index');
    Route::get('/orders/{id}','OrderController@show');
    Route::get('/user/message','PanelController@message');
    Route::get('/user/deactivate/{id}','UserController@deactivate');
    Route::get('/user/remove/{id}','UserController@remove');
    Route::get('user/edit/{user}', 'UserController@edit')->name('users.edit');
    Route::patch('user/update/{user}','UserController@update')->name('users.update');

});




Route::post('/order/save','UserController@saveOrder');


Route::get('/adminUser',function(){
  User::create([
    'name' =>'mahdi',
    'phone' =>'9351510925',
    'level' =>'admin',
    'email' => 'user@yahoo.com',
    'password' => bcrypt('12345678')
  ]);
  return 'admin created';
});
