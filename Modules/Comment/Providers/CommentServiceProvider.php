<?php

namespace Modules\Comment\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Factory;

use Modules\Base\Traits\AddsAsset;
use Modules\Admin\Ui\Facades\TabManager;
use Modules\Comment\Admin\Tabs\CommentTabs;
class CommentServiceProvider extends ServiceProvider
{
    use AddsAsset;

    public function boot()
    {
        TabManager::register('comment', CommentTabs::class);
       
    }

  
    public function register()
    {
        // $this->app->register(RouteServiceProvider::class);
    }
}
