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
Route::get('/','IndexController@index')->name('index.index');

Route::post('detail', 'ProductController@show')->name('product.show');

Route::post('/checkout/{title},{price},{unit},{img}','CheckOutController@index')->name('checkout');
Route::post('/backurl/success','BackUrlController@success')->name('backurl.success');

Route::post('/backurl/failure','BackUrlController@failure')->name('backurl.failure');

Route::post('/backurl/pending','BackUrlController@pending')->name('backurl.pending');

Route::post('notification','NotificationController@notification')->name('notification');

Route::get('notification','NotificationController@notification')->name('notification');


//Route::get('notification','BackUrlController@notification')->name('notification');