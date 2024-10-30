<?php

namespace App\Providers;

use App\Contracts\Parser\UtilityServiceInterface;
use App\Contracts\Repositories\ProductRepositoryInterface;
use App\Contracts\Repositories\SellerRepositoryInterface;
use App\Contracts\Services\ProductServiceInterface;
use App\Contracts\Services\SellerServiceInterface;
use App\Repositories\ProductRepository;
use App\Repositories\SellerRepository;
use App\Services\ProductService;
use App\Services\SellerService;
use App\Services\UtilityService;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(ProductRepositoryInterface::class, ProductRepository::class);
        $this->app->bind(ProductServiceInterface::class, ProductService::class);

        $this->app->bind(SellerRepositoryInterface::class, SellerRepository::class);
        $this->app->bind(SellerServiceInterface::class, SellerService::class);

        $this->app->bind(UtilityServiceInterface::class, UtilityService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        JsonResource::withoutWrapping();
    }
}
