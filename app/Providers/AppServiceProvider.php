<?php

namespace App\Providers;

use Inertia\Inertia;
use App\Models\Category;
use Illuminate\Support\Facades\Schema;
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
        // Cek apakah tabel 'categories' sudah ada sebelum mencoba mengambil data
        if (Schema::hasTable('categories')) {
            Inertia::share('categories', Category::all());
        } else {
            // Jika tabel belum ada, bagikan data kosong ke Inertia
            Inertia::share('categories', []);
        }
    }
}
