<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('auth/register', 'AuthController@register');
Route::post('auth/login', 'AuthController@login');
Route::group(['middleware' => 'jwt.auth'], function(){
  Route::get('auth/user', 'AuthController@user');
  Route::get('news', 'NewsController@index');
  Route::get('newscategories', 'NewsCategoryController@index');
  Route::get('news/{id}', 'NewsController@show');
  Route::get('newscategory/{id}', 'NewsCategoryController@show');
  Route::post('news', 'NewsController@store');
  Route::post('newscategory', 'NewsCategoryController@store');
  Route::put('news', 'NewsController@store');
  Route::put('newscategory', 'NewsCategoryController@store');
  Route::delete('news/{id}', 'NewsController@destroy');
  Route::delete('newscategory/{id}', 'NewsCategoryController@destroy');
});

Route::group(['middleware' => 'jwt.refresh'], function(){
  Route::get('/token/refresh', 'AuthController@refresh');
});
