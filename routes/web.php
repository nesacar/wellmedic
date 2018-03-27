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
      (object) ["name" => "Ganoderma lucidium", "categorie" => "Kapsule na bazi ulja iz spora", "about" => "Doktori i naučnici znaju da pomaže u sledećim: Dovodi kiseonik u telo povećava izdržljivost, pruža više snage i energije"],
      (object) ["name" => "Ženšen i rog mladog jelena", "categorie" => "Kapsule", "about" => "Jača imuni sistem. Oslobađa telo fizičkog zamora. Vraća energiju. Štiti krvne sudove srca."],
      (object) ["name" => "Pasta za zube", "categorie" => "Pasta za zube", "about" => "Doktori i naučnici znaju da pomaže u sledećim: Dovodi kiseonik u telo povećava izdržljivost, pruža više snage i energije"]
    ];
    $title = 'Veleprodaja medicinskih sredstava';
    return view('themes.wellmedic.pages.home', compact('title', 'items'));
});
