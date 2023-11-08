<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CostumerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\DetailSaleController;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');

	//Ruta de Clientes
	Route::get('costumers/index','App\Http\Controllers\CostumerController@index')->name('customers/index');
	Route::resource('costumers', CostumerController::class);

	//Ruta de Productos
	Route::get('products/index','App\Http\Controllers\ProductController@index')->name('products/index');
	Route::resource('products', ProductController::class);



	//Ruta de Detalle de Ventas
	Route::get('detail_sales/index','App\Http\Controllers\DetailSaleController@index')->name('detail_sales/index');
	Route::resource('detail_sales', DetailSaleController::class);

	Route::get('sales/filter', 'App\Http\Controllers\SaleController@filterByDate')->name('sales.filter');

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
	Route::get('{page}', ['as' => 'page.index', 'uses' => 'App\Http\Controllers\PageController@index']);
	
	//Ruta de Ventas
	Route::get('sales/list','App\Http\Controllers\SaleController@index')->name('sales/list');
	Route::resource('sales', SaleController::class);
	
});

