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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Метод GetSections - возвращает список разделов
Route::get('get-sections', 'SectionController@index');

//Метод GetItems(section) - возвращает список товаров соответствующего раздела
Route::get('get-items/{section_id}', 'ItemController@index');

//Метод GetItemInfo(item) - возвращает информацию о товаре
Route::get('get-item-info/{id}', 'ItemController@show');