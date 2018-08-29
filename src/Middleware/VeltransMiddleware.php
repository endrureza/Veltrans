<?php

/*
 * This file is part of the endru/veltrans package.
 *
 * (c) Endru Reza <lotusb13@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE file that was distributed with this source code.
 *
 * @see https://github.com/endrureza/veltrans
 */

namespace Endru\Veltrans\Middleware;

use Endru\Veltrans\Exceptions\VeltransException;
use Closure;

class VeltransMiddleware
{

    public function handle($request, Closure $next)
    {
        if (!config('veltrans.client_key') === '') {
            throw new VeltransException('Your midtrans client key cannot be empty');
        }

        if (!config('veltrans.server_key') === '') {
            throw new VeltransException('Your midtrans server key cannot be empty');
        }

        if (config('veltrans.merchant_id') === '') {
            throw new VeltransException('Your midtrans merchant id cannot be empty');
        }

        if (config('veltrans.is_production') === '') {
            throw new VeltransException('Veltrans cannot decide your environment');
        }

        if (config('veltrans.auth_key') === '') {
            throw new VeltransException('Veltrans auth key cannot be empty');
        }

        if (strlen(config('veltrans.auth_key')) <= 31) {
            throw new VeltransException('Veltrans auth key length must be 32 or more');
        }

        if ($request->token !== config('veltrans.auth_key')) {
            throw new VeltransException('Wrong veltrans auth key');
        }

        return $next($request);
    }

}
