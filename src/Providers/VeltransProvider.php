<?php

/*
 * This file is part of the endru/velitrans package.
 *
 * (c) Endru Reza <lotusb13@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE file that was distributed with this source code.
 *
 * @see https://github.com/endrureza/veltrans
 */

namespace Endru\Veltrans\Providers;

use Endru\Veltrans\Exceptions\VeltransException;
use Endru\Veltrans\Veltrans;
use Illuminate\Support\ServiceProvider;

class VeltransProvider extends ServiceProvider
{
    public function boot()
    {
        // Config
        $this->publishes([
            __DIR__ . '/../../config/veltrans.php' => config_path('veltrans.php'),
        ]);
        
        // Route
        $this->loadRoutesFrom(
            __DIR__ . '/../../routes/veltrans.php'
        );

        // View
        $this->loadViewsFrom(
            __DIR__ . '/../../resources/views', 'veltrans'
        );
    }

    public function register()
    {
        // $this->app->singleton(VeltransException::class, function() {
        //     return new VeltransException();
        // });

        // $this->app->singleton(Veltrans::class, function () {
        //     return new Veltrans();
        // });

        // $this->app->alias(Veltrans::class, 'veltrans');
    }
}
