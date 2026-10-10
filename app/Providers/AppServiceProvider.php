<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
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
        // Photos are optional files; views only show them once they exist.
        View::composer('*', function ($view) {
            $photoUrl = $this->publicFileUrl(config('portfolio.photo'));

            $view->with([
                'photoUrl' => $photoUrl,
                'aboutPhotoUrl' => $this->publicFileUrl(config('portfolio.about_photo')) ?? $photoUrl,
            ]);
        });
    }

    /**
     * URL of a file in public/, or null when it does not exist.
     */
    private function publicFileUrl(?string $path): ?string
    {
        return $path && is_file(public_path($path)) ? asset($path) : null;
    }
}
