<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\PagesController;
use \App\Http\Controllers\SaleController;


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

// Route::group(['prefix' => '/'] , function(){
    // Route::resource('todos', TodoController::class);
    Route::get('/', [PagesController::class, 'form']);
    Route::resource('sales', SaleController::class);
    Route::post('/store-form', [PagesController::class, 'storeForm']);
// });


// Route::get('/', function () {
//     return view('welcome');
// });
