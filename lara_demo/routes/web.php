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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', function () {
    return view('admin/home');
});
Route::get('/user/list','user\\listController@index');

Route::resource('admin/banner', 'Admin\\bannerController');
Route::resource('admin/category', 'Admin\\categoryController');
Route::resource('admin/coupon', 'Admin\\couponController');
// Route::

Route::resource('admin/product', 'Admin\\productController');

Route::resource('admin/attributes', 'Admin\\attributesController');
Route::resource('admin/product_attributes', 'Admin\\product_attributesController');
Route::resource('admin/product_attr_val', 'Admin\\product_attr_valController');