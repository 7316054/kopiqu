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

/* 

Route::get('/hello', function () {
     return "<h1>Hellow </h1>";
 });

Route::get('/users/{id}/{name}',function($id,$name){
    return 'This is user '.$id." Namanya adalah ".$name;
});

Route::get('/about', function (){
    return view('pages.about');
});

*/

//fixed
Route::resource('posts','PostsController');


Route::resource('transaction','TransactionController');
Route::resource('order','OrderController');
Route::resource('pages','PagesController');


Route::get('/order','OrderController@index');

Route::get('/manageOrder','OrderController@manage');
Route::get('/wallet','OrderController@wallet');

Route::get('/','PagesController@index');


Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/adminHome', 'adminHomeController@index');

Route::group(['middleware'=>['web','auth']],function(){
    Route::get('/home', function (){
      if(Auth::user()->admin==0){
          return view('home');
      }else {
          $users['users']= \App\User::all();
          return view('adminhome',$users);
      }
    });
});

Route::group(['middleware' => 'App\Http\Middleware\isCustomer'], function()
{
    Route::get('/cart','TransactionController@index');
    Route::get('/orderList','OrderController@home');
});
