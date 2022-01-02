<?php

namespace App\Providers;

use App\Commands\Post\PostCommand;
use App\Handler\Post\PostHandler;
use App\Http\Controllers\Api\PostController;
use App\Service\CommentRepository;
use App\Service\InterfaceRepository;
use App\Service\PostRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
      $this->app->when(PostController::class)
          ->needs(InterfaceRepository::class)
          ->give(PostRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
