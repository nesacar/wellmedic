<?php

namespace App\Http\Controllers;

use App\Box;
use App\Post;
use App\Setting;
use App\Theme;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        $theme = Theme::getTheme();
        $settings = Setting::find(1);
        $sliders = Box::getSlider();
        $posts = Post::getLatest(3);
        $items = [
            (object) ["name" => "Ganoderma lucidium", "categorie" => "Kapsule na bazi ulja iz spora", "tagline" => "Lek kineskih careva 4000 godina", "about" => "Doktori i naučnici znaju da pomaže u sledećim: Dovodi kiseonik u telo povećava izdržljivost, pruža više snage i energije"],
            (object) ["name" => "Ženšen i rog mladog jelena", "categorie" => "Kapsule", "tagline" => "Za bolji natalitet Srbije", "about" => "Jača imuni sistem. Oslobađa telo fizičkog zamora. Vraća energiju. Štiti krvne sudove srca."],
            (object) ["name" => "Pasta za zube", "categorie" => "Pasta za zube", "tagline" => "Na bazi Zelenog propolisa i ulja Ganoderme lucidium", "about" => "Doktori i naučnici znaju da pomaže u sledećim: Dovodi kiseonik u telo povećava izdržljivost, pruža više snage i energije"]
        ];
        return view('themes.'.$theme.'.pages.home', compact('title', 'sliders', 'settings', 'theme', 'posts', 'items'));
    }
}
