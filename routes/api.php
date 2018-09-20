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
  Route::get('apiabouts', 'AboutController@index');
  Route::get('apinewsy', 'NewsController@index');
  Route::get('apinewscategories', 'NewsCategoryController@index');
  Route::get('apidownloads', 'DownloadController@index');
  Route::get('apidownloadcategories', 'DownloadCategoryController@index');
  Route::get('apisettings', 'SettingController@index');
  Route::get('apiabout/{uid}', 'AboutController@show');
  Route::get('apinews/{uid}', 'NewsController@show');
  Route::get('apinewscategory/{uid}', 'NewsCategoryController@show');
  Route::get('apidownload/{uid}', 'DownloadController@show');
  Route::get('apidownloadcategory/{uid}', 'DownloadCategoryController@show');
  Route::get('apisetting/{uid}', 'SettingController@show');
  Route::post('apiabout', 'AboutController@store');
  Route::post('apinews', 'NewsController@store');
  Route::post('apinewscategory', 'NewsCategoryController@store');
  Route::post('apidownload', 'DownloadController@store');
  Route::post('apidownloadcategory', 'DownloadCategoryController@store');
  Route::post('apisetting', 'SettingController@store');
  Route::put('apiabout', 'AboutController@store');
  Route::put('apinews', 'NewsController@store');
  Route::get('apinews/feature/{uid}', 'NewsController@feature');
  Route::get('apinews/publish/{uid}', 'NewsController@publish');
  Route::put('apinewscategory', 'NewsCategoryController@store');
  Route::put('apidownload', 'DownloadController@store');
  Route::put('apidownloadcategory', 'DownloadCategoryController@store');
  Route::put('apisetting', 'SettingController@store');
  Route::delete('apiabout/{uid}', 'AboutController@destroy');
  Route::delete('apinews/{uid}', 'NewsController@destroy');
  Route::delete('apinewscategory/{uid}', 'NewsCategoryController@destroy');
  Route::delete('apidownload/{uid}', 'DownloadController@destroy');
  Route::delete('apidownloadcategory/{uid}', 'DownloadCategoryController@destroy');
  Route::delete('apisetting/{uid}', 'SettingController@destroy');
});

Route::group(['middleware' => 'jwt.refresh'], function(){
  Route::get('/auth/refresh', 'AuthController@refresh');
});

Route::get('abouts', 'AboutController@index');
Route::get('news/{p}', 'NewsController@news');
Route::get('featured_events/{p}', 'NewsController@featured_events');
Route::get('academic_news/{p}', 'NewsController@academic_news');
Route::get('events/{p}', 'NewsController@events');
Route::get('activities/{p}', 'NewsController@activities');
Route::get('newscategories', 'NewsCategoryController@index');
Route::get('it_downloadables/{p}', 'DownloadController@it');
Route::get('is_downloadables/{p}', 'DownloadController@is');
Route::get('downloadcategories', 'DownloadCategoryController@index');
Route::get('settings', 'SettingController@index');
Route::get('about/{uid}', 'AboutController@show');
Route::get('news/{uid}', 'NewsController@show');
Route::get('newscategory/{uid}', 'NewsCategoryController@show');
Route::get('download/{uid}', 'DownloadController@show');
Route::get('downloadcategory/{uid}', 'DownloadCategoryController@show');
Route::get('setting/{uid}', 'SettingController@show');
// Route::post('about', 'AboutController@store');
// Route::post('news', 'NewsController@store');
// Route::post('newscategory', 'NewsCategoryController@store');
// Route::post('download', 'DownloadController@store');
// Route::post('downloadcategory', 'DownloadCategoryController@store');
// Route::put('about', 'AboutController@store');
// Route::put('news', 'NewsController@store');
// Route::put('newscategory', 'NewsCategoryController@store');
// Route::put('download', 'DownloadController@store');
// Route::put('downloadcategory', 'DownloadCategoryController@store');
// Route::delete('about/{uid}', 'AboutController@destroy');
// Route::delete('news/{uid}', 'NewsController@destroy');
// Route::delete('newscategory/{uid}', 'NewsCategoryController@destroy');
// Route::delete('download/{uid}', 'DownloadController@destroy');
// Route::delete('downloadcategory/{uid}', 'DownloadCategoryController@destroy');
