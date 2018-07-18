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

use Illuminate\Support\ServiceProvider;

class VeltransProvider extends ServiceProvider
{
    public function boot() 
    {

    }

    public function register()
    {
        $this->app->singleton(Veltrans::class, function () {
            return new Veltrans();
        });

        $this->app->alias(Veltrans::class, 'veltrans');
    }
}