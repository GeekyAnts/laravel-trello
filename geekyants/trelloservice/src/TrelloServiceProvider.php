<?php

namespace GeekyAnts\TrelloService;

use Illuminate\Support\ServiceProvider;

class TrelloServiceProvider extends ServiceProvider
{
    public function boot()
    {
        //
    }
    public function register()
    {
        if (!$this->app->configurationIsCached()) {
            $this->mergeConfigFrom(__DIR__ . '/../config/trello.php', 'trello');
        }
    }
}
