<?php

use Illuminate\Support\Facades\Route;

Route::get('/','App\Http\Controllers\AdminController@index');

//Admin - account -login
Route::get('/admin','App\Http\Controllers\AdminController@index');
Route::get('/dashboard','App\Http\Controllers\AdminController@show_dashboard');
Route::get('/logout','App\Http\Controllers\AdminController@logout');
Route::post('/admin-dashboard','App\Http\Controllers\AdminController@dashboard');

//CATEGORY-ROOM
Route::get('/category-room','App\Http\Controllers\CategoryRoom@all_category_room');
Route::get('/add-category-room','App\Http\Controllers\CategoryRoom@add_category_room');

Route::get('/edit-category-room/{category_room_id}','App\Http\Controllers\CategoryRoom@edit_category_room');
Route::get('/delete-category-room/{category_room_id}','App\Http\Controllers\CategoryRoom@delete_category_room');
Route::get('/all-category-room','App\Http\Controllers\CategoryRoom@all_category_room');

Route::get('/unactive-category-room/{category_room_id}','App\Http\Controllers\CategoryRoom@unactive_category_room');
Route::get('/active-category-room/{category_room_id}','App\Http\Controllers\CategoryRoom@active_category_room');

Route::post('/save-category-room','App\Http\Controllers\CategoryRoom@save_category_room');
Route::post('/update-category-room/{category_room_id}','App\Http\Controllers\CategoryRoom@update_category_room');

//ROOM
Route::get('/add-room','App\Http\Controllers\RoomController@add_room');
Route::get('/edit-room/{room_id}','App\Http\Controllers\RoomController@edit_room');
Route::get('/delete-room/{room_id}','App\Http\Controllers\RoomController@delete_room');
Route::get('/all-room','App\Http\Controllers\RoomController@all_room');

Route::get('/unactive-room/{room_id}','App\Http\Controllers\RoomController@unactive_room');
Route::get('/active-room/{room_id}','App\Http\Controllers\RoomController@active_room');

Route::post('/save-room','App\Http\Controllers\RoomController@save_room');
Route::post('/update-room/{room_id}','App\Http\Controllers\RoomController@update_room');

//CUSTOMER
Route::get('/add-customer','App\Http\Controllers\CustomerController@add_customer');
Route::get('/all-customer','App\Http\Controllers\CustomerController@all_customer');
Route::get('/edit-customer/{customer_id}','App\Http\Controllers\CustomerController@edit_customer');
Route::get('/delete-customer/{customer_id}','App\Http\Controllers\CustomerController@delete_customer');

Route::post('/save-customer','App\Http\Controllers\CustomerController@save_customer');

Route::post('/update-customer/{customer_id}','App\Http\Controllers\CustomerController@update_customer');

// BOOK-ROOM
Route::get('/book-room/{customer_id}','App\Http\Controllers\CustomerController@book_room');


Route::post('/selected-room','App\Http\Controllers\CustomerController@selected_room');
Route::post('/save-book-room','App\Http\Controllers\CustomerController@save_book_room');

//CHECKOUT

Route::get('/all-book-room','App\Http\Controllers\CheckoutController@all_book_room');
Route::post('/checkout-room	','App\Http\Controllers\CheckoutController@checkout_room');
Route::get('/checkout/{room_id}','App\Http\Controllers\CheckoutController@checkout');




