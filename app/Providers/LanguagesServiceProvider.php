<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;

class LanguageServiceProvider extends ServiceProvider
{
    public function boot()
    {
        View::composer('*', function ($view) {
            $view->with('currentLanguage', Auth::check() ? Auth::user()->language : config('app.locale'));
            $view->with('availableLanguages', config('languages.available'));
        });
    }

    public function register()
    {
        //
    }
}