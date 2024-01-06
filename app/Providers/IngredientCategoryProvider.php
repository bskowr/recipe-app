<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Facades\IngredientCategoryRepository;

class IngredientCategoryProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind('IngredientCategoryRepository', function () {
            return new IngredientCategoryRepository();
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
