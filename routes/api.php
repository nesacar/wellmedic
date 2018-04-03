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

Route::middleware('auth:api')->get('users/logout', 'UsersController@logout');
Route::middleware('auth:api')->get('users/get-users', 'UsersController@getUsers');
Route::middleware('auth:api')->post('users/change-password', 'UsersController@changePassword');
Route::middleware('auth:api')->resource('users', 'UsersController');
Route::middleware('auth:api')->post('users/{id}/image', 'UsersController@uploadImage');

Route::middleware('auth:api')->get('settings/{id}/edit', 'SettingsController@edit');
Route::middleware('auth:api')->patch('settings/{id}', 'SettingsController@update');

Route::middleware('auth:api')->resource('themes', 'ThemesController');
Route::middleware('auth:api')->post('themes/{id}/image', 'ThemesController@uploadImage');

Route::middleware('auth:api')->resource('menus', 'MenusController');

Route::middleware('auth:api')->get('menu-links/lists', 'MenuLinksController@lists');
Route::middleware('auth:api')->resource('menu-links', 'MenuLinksController');
Route::middleware('auth:api')->get('menu-links/{id}/sort', 'MenuLinksController@sort');
Route::middleware('auth:api')->post('menu-links/{id}/order', 'MenuLinksController@saveOrder');

Route::middleware('auth:api')->resource('testimonials', 'TestimonialsController');

Route::middleware('auth:api')->resource('collections', 'CollectionsController');

Route::middleware('auth:api')->resource('products', 'ProductsController');
