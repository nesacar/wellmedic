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
    $items = [
      (object) ["name" => "Ganoderma lucidium", "categorie" => "kapsule na bazi ulja iz spora", "about" => "Doktori i naučnici znaju da pomaže u sledećim: Dovodi kiseonik u telo povećava izdržljivost, pruža više snage i energije"],
      (object) ["name" => "ženšen i rog mladog jelena", "categorie" => "kapsule", "about" => "Doktori i naučnici znaju da pomaže u sledećim: Dovodi kiseonik u telo povećava izdržljivost, pruža više snage i energije"],
      (object) ["name" => "Pasta za zube", "categorie" => "pasta za zube", "about" => "Doktori i naučnici znaju da pomaže u sledećim: Dovodi kiseonik u telo povećava izdržljivost, pruža više snage i energije"]
    ];
    $title = 'Veleprodaja medicinskih sredstava';
    return view('themes.wellmedic.pages.home', compact('title', 'items'));
});
