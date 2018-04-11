<?php

namespace App\Providers;

use App\MenuLink;
use App\Theme;
use Illuminate\Support\ServiceProvider;

class ViewComposerServiseProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->composerDesktopMenu();
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    private function composerDesktopMenu(){
        $theme = Theme::getTheme();
        $links = MenuLink::where('publish', 1)->where('parent', 0)->orderBy('order', 'ASC')->get();
        view()->composer('themes.'.$theme.'.partials.header', function($view) use ($links){
            $view->with('links', $links);
        });
        view()->composer('themes.'.$theme.'.partials.mobile-nav', function($view) use ($links){
            $view->with('links', $links);
        });
    }
}
