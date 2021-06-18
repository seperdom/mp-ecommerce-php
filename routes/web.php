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
Route::get('/backurl/success','BackUrlController@success')->name('backurl.success');

Route::get('/backurl/failure','BackUrlController@failure')->name('backurl.failure');

Route::get('/backurl/pending','BackUrlController@pending')->name('backurl.pending');

Route::post('notification','NotificationController@success')->name('notification');

Route::get('notification','NotificationController@success')->name('notification');


//Route::get('notification','BackUrlController@notification')->name('notification');