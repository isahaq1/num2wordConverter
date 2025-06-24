<?php

namespace Isahaq\Num2str;

use Illuminate\Support\ServiceProvider;

class Num2StrServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(Num2Str::class, function () {
            return new Num2Str();
        });
    }

    public function boot()
    {
        //
    }
}
