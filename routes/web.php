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

Route::resource('posts','PostsController');
Route::resource('transaction','TransactionController');

Route::get('/cart','TransactionController@index');

Route::get('/','PagesController@index');
Route::get('/about','PagesController@about');
Route::get('/services','PagesController@services');

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

