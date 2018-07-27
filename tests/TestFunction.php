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

namespace Endru\Veltrans\Tests;

use Veltrans;

class TestFunction extends TestCase
{
    public function testRoute()
    {
        $app_url = env('APP_URL');

        $urls = [
            '/snap',
            '/vtweb',
            '/core'
        ];

        echo PHP_EOL;

        foreach ($urls as $url) {
            $response = $this->get($url);

            if((int)$response->status() !== 200) {
                echo $app_url.$url. '(FAILED)';
                $this->assertTrue(false);
            } else {
                echo $app_url.$url.'(SUCCESS)';
                $this->assertTrue(true);
            }
            echo PHP_EOL;
        }
    }
}
