<?php

namespace App\Providers;

use App\Repositories\Blog\BlogRepository;
use App\Repositories\Blog\BlogRepositoryInterface;
use App\Repositories\Product\ProductRepository;
use App\Repositories\Product\ProductRepositoryInterface;
use App\Repositories\ProductCategory\ProductCategoryRepository;
use App\Repositories\ProductCategory\ProductCategoryRepositoryInterface;
use App\Repositories\ProductIndustry\ProductIndustryRepository;
use App\Repositories\ProductIndustry\ProductIndustryRepositoryInterface;
use App\Repositories\ProductComment\ProductCommentRepository;
use App\Repositories\ProductComment\ProductCommentRepositoryInterface;
use App\Service\Blog\BlogService;
use App\Service\Blog\BlogServiceInterface;
use App\Service\Product\ProductService;
use App\Service\Product\ProductServiceInterface;
use App\Service\ProductCategory\ProductCategoryService;
use App\Service\ProductCategory\ProductCategoryServiceInterface;
use App\Service\ProductIndustry\ProductIndustryService;
use App\Service\ProductIndustry\ProductIndustryServiceInterface;
use App\Service\ProductComment\ProductCommentService;
use App\Service\ProductComment\ProductCommentServiceInterface;
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
        //Product
        $this->app->singleton(
            ProductRepositoryInterface::class,
            ProductRepository::class
        );

        $this->app->singleton(
            ProductServiceInterface::class,
            ProductService::class
        );

        //ProductComment
        $this->app->singleton(
            ProductCommentRepositoryInterface::class,
            ProductCommentRepository::class
        );

        $this->app->singleton(
            ProductCommentServiceInterface::class,
            ProductCommentService::class
        );
        //Category
        $this->app->singleton(
            ProductCategoryRepositoryInterface::class,
            ProductCategoryRepository::class
        );

        $this->app->singleton(
            ProductCategoryServiceInterface::class,
            ProductCategoryService::class
        );

        //industry
        $this->app->singleton(
            ProductIndustryRepositoryInterface::class,
            ProductIndustryRepository::class
        );

        $this->app->singleton(
            ProductIndustryServiceInterface::class,
            ProductIndustryService::class
        );

        //Blog
        $this->app->singleton(
            BlogRepositoryInterface::class,
            BlogRepository::class
        );

        $this->app->singleton(
            BlogServiceInterface::class,
            BlogService::class
        );
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