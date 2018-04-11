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
Route::get('proizvodi', 'PagesController@products');
Route::get('proizvodi/{slug}/{id}', 'PagesController@product');

Route::post('subscribe', 'PagesController@subscribe');

Route::get('/about', function () {
  $title = 'O Nama';
  return view('themes.wellmedic.pages.about', compact('title'));
});

Route::get('/blog', 'PagesController@blog');

Route::get('/blog/{id}', function () {
  $title = 'Blog Post';
  return view('themes.wellmedic.pages.blog-post', compact('title'));
});

Route::get('/contact', function () {
  $title = 'Kontakt';
  return view('themes.wellmedic.pages.contact', compact('title'));
});

Route::get('/experiences', function () {
  $title = 'Iskustva korisnika';
  return view('themes.wellmedic.pages.experiences', compact('title'));
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin', function () {
    return view('layouts.admin-app');
});
