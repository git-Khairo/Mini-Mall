<?php

namespace App\Providers;

use App\repository\CategoryRepository;
use App\repository\CategoryRepositoryInterface;
use App\repository\ProductRepository;
use App\repository\ProductRepositoryInterface;
use App\repository\UserRepository;
use App\repository\UserRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(UserRepositoryInterface::class,UserRepository::class);
        $this->app->bind(CategoryRepositoryInterface::class,CategoryRepository::class);
        $this->app->bind(ProductRepositoryInterface::class,ProductRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
