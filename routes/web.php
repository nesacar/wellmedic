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

Route::get('/', 'PagesController@index');

Route::get('blog', 'PagesController@blog');
Route::get('blog/{slug}/{id}', 'PagesController@blogPost');

Route::get('proizvodi', 'PagesController@products');
Route::get('proizvodi/{slug}/{id}', 'PagesController@product');

Route::get('iskustva', 'PagesController@experiences');
Route::get('iskustva/{slug}/{id}', 'PagesController@experiencesProduct');
Route::get('iskustva/{slug}/{id}', 'PagesController@experiencesProduct');

Route::get('kontakt', 'PagesController@contact');
Route::post('kontakt', 'PagesController@contactForm');

Route::get('o-nama', 'PagesController@about');


Route::post('subscribe', 'PagesController@subscribe');

Route::get('/about', function () {
  $title = 'O Nama';
    $theme = \App\Theme::getTheme();
    $settings = \App\Setting::get();
  return view('themes.wellmedic.pages.about', compact('title', 'theme', 'settings'));
});


Route::get('/contact', function () {
  $title = 'Kontakt';
  $theme = \App\Theme::getTheme();
  $settings = \App\Setting::get();
  return view('themes.wellmedic.pages.contact', compact('title', 'theme', 'settings'));
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin', function () {
    return view('layouts.admin-app');
});
