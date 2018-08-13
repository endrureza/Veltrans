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

namespace Endru\Veltrans\Middleware;

use Closure;

class VeltransAuthMiddleware
{

    public function handle($request, Closure $next)
    {
        if (is_null(config('veltrans.auth_key'))) {

            return response()->json([
                'message' => 'Auth key cannot be null'
            ]);

        }

        if (strlen(config('veltrans.auth_key')) <= 31) {

            return response()->json([
                'message' => 'Auth key length must be 32 or more'
            ]);

        }

        if ($request->token !== config('veltrans.auth_key')) {

            return response()->json([
                'message' => 'Wrong auth key'
            ]);

        }

        return $next($request);
    }

}
