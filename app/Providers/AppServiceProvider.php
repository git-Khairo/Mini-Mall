<?php

namespace App\Providers;

use App\Models\Order;
use App\Observers\OrderObserver;
use App\repository\FavoriteRepository;
use App\repository\AdminRepository;
use App\repository\CategoryRepository;
use App\repository\OrderRepository;
use App\repositoryInterface\CategoryRepositoryInterface;
use App\repository\ProductRepository;
use App\repository\ShopRepository;
use App\repositoryInterface\ProductRepositoryInterface;
use App\repository\UserRepository;
use App\repositoryInterface\AdminRepositoryInterface;
use App\repositoryInterface\FavoriteRepositoryInterface;
use App\repositoryInterface\OrderRepositoryInterface;
use App\repositoryInterface\ShopRepositoryInterface;
use App\repositoryInterface\UserRepositoryInterface;
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
        $this->app->bind(AdminRepositoryInterface::class,AdminRepository::class);
        $this->app->bind(FavoriteRepositoryInterface::class,FavoriteRepository::class);
        $this->app->bind(OrderRepositoryInterface::class,OrderRepository::class);
        $this->app->bind(ShopRepositoryInterface::class,ShopRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Order::observe(OrderObserver::class);
    }
}
