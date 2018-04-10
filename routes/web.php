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

Route::get('/products', function () {
  $items = [
    (object) ["name" => "Ganoderma lucidium", "categorie" => "Kapsule na bazi ulja iz spora", "tagline" => "Lek kineskih careva 4000 godina", "about" => "Doktori i naučnici znaju da pomaže u sledećim: Dovodi kiseonik u telo povećava izdržljivost, pruža više snage i energije"],
    (object) ["name" => "Ženšen i rog mladog jelena", "categorie" => "Kapsule", "tagline" => "Za bolji natalitet Srbije", "about" => "Jača imuni sistem. Oslobađa telo fizičkog zamora. Vraća energiju. Štiti krvne sudove srca."],
    (object) ["name" => "Pasta za zube", "categorie" => "Pasta za zube", "tagline" => "Na bazi Zelenog propolisa i ulja Ganoderme lucidium", "about" => "Doktori i naučnici znaju da pomaže u sledećim: Dovodi kiseonik u telo povećava izdržljivost, pruža više snage i energije"]
  ];
  $title = 'Proizvodi';
  return view('themes.wellmedic.pages.products', compact('title', 'items'));
});

Route::get('/products/{id}', function () {
  $title = 'Product name..';
  return view('themes.wellmedic.pages.product', compact('title'));
});

Route::get('/about', function () {
  $title = 'O Nama';
  return view('themes.wellmedic.pages.about', compact('title'));
});

Route::get('/blog', function () {
  $title = 'Blog';
  return view('themes.wellmedic.pages.blog', compact('title'));
});

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
