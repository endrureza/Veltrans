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

namespace Endru\Veltrans\Exceptions;

use Exception;
use Log;

class VeltransException extends Exception
{
    public $message;

    public function __construct($message)
    {
        $this->message = $message;
    }

    public function report()
    {
        Log::error($this->message);
    }

    public function render($request)
    {
        if (config('app.env') == 'production') {
            return view('veltrans::errors', [
                'error' => $this->message
            ]);
        }

        return response()->json([
            'error' => [
                'message' => $this->message
            ]
        ], 200);
    }
}
