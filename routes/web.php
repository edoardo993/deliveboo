<?php

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('homepage-edo-vito');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('admin')
    ->namespace('Admin')
    ->middleware('auth')
    ->group(function () {
    Route::resource('restaurants', 'RestaurantController');
    Route::resource('plates', 'PlateController');


});

Route::get('/single-restaurant/{restaurant}', 'SingleRestaurantController@singleRestaurant')
    ->name('single-restaurant');

Route::get('/payments', function () {
    return view('payments');
});

Route::get("/payment/make", "PaymentsController@make")->name("payment.make");
