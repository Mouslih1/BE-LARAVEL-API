<?php

namespace App\Providers;

use App\Models\Product;
use App\Models\Review;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        /*
        Relation::enforceMorphMap([
            'user' => User::class,
            'product' => Product::class,
            'review' => Review::class
        ]);*/
    }
}
