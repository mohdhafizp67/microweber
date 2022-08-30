<?php

namespace MicroweberPackages\Post;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;
use MicroweberPackages\Database\Observers\BaseModelObserver;
use MicroweberPackages\Post\Http\Livewire\Admin\PostsTable;
use MicroweberPackages\Post\Models\Post;
use MicroweberPackages\Post\Observers\PostObserver;

class PostServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Post::observe(BaseModelObserver::class);
        Post::observe(PostObserver::class);

        View::addNamespace('post', __DIR__ . '/resources/views');

        Livewire::component('admin-posts-table', PostsTable::class);

        $this->loadRoutesFrom(__DIR__ . '/routes/api.php');
        $this->loadRoutesFrom(__DIR__ . '/routes/web.php');
    }

}
