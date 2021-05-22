<?php

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

Route::get('/', 'HomeController');
Route::post('guest-info', 'UserController@storeInfo');
Route::get('/remove-info', 'UserController@removeInfo');

Route::get('entries/{email}/fetch', 'EntryController@viewTransaction')->name('order.previous')->middleware('signed');
Route::resource('entries', 'EntryController');
Route::post('entries/{id}/add_order', 'EntryController@addOrder')->name('entry.addorder');
Route::post('entries/checkout_order', 'EntryController@checkoutOrder')->name('entry.checkout_order');
Route::post('/pay', 'PaymentController@redirectToGateway')->name('pay');
Route::get('/payment/callback', 'PaymentController@handleGatewayCallback');

