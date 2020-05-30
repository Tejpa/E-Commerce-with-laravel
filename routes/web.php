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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/','admin\ProductsController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['middleware' => ['auth','admin']], function () {

   Route::get('/dashboard', function () {
    return view('admin.dashboard');
   }); 
   Route::get('/users', 'admin\DashboardController@registered');
   Route::get('/update/{id}','admin\DashboardController@registeredit');
   Route::put('/userupdate/{id}','admin\DashboardController@registerupdate');
   Route::delete('/delete/{id}','admin\DashboardController@registerdelete');
   Route::get('/products/proindex','admin\ProductsController@adminproindex');
   Route::get('/products/create','admin\ProductsController@create');
   Route::post('store','admin\ProductsController@store');
   Route::get('/products/edit/{id}','admin\ProductsController@productedit');
   Route::put('/products/update/{id}','admin\ProductsController@productupdate');
   Route::delete('/delete/{id}','admin\ProductsController@delete');
});
