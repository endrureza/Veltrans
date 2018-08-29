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

namespace Endru\Veltrans\Facades;

use Endru\Veltrans\Veltrans;
use Illuminate\Support\Facades\Facade;

class VeltransFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'veltrans';
    }
}
