<?php

namespace Compass\Providers;

use Illuminate\Support\ServiceProvider;
use Compass\Composers\LayoutComposer;

/**
 * Class ViewComposerServiceProvider
 */
class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(): void
    {
        view()->composer('*', LayoutComposer::class);
    }
}
