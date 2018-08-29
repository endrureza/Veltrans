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

Route::group(
    [
        'prefix' => 'veltrans',
        'namespace' => 'Endru\Veltrans\Controllers',
        'middleware' => [
            Endru\Veltrans\Middleware\VeltransMiddleware::class,
        ],
    ], function () {

        // Snap Route
        Route::group(['prefix' => 'snap'], function () {
            Route::post('/create_transaction', [
                'as' => 'veltrans.snap.create_transaction',
                'uses' => 'SnapController@createTransaction',
            ]);
        });

        // Core API Route
        Route::group(['prefix' => 'core'], function () {

            Route::get('/token', [
                'as' => 'veltrans.core.token',
                'uses' => 'CoreAPIController@token',
            ]);

            Route::post('/charge', [
                'as' => 'veltrans.core.charge',
                'uses' => 'CoreAPIController@charge',
            ]);

            Route::post('/capture', [
                'as' => 'veltrans.core.capture',
                'uses' => 'CoreAPIController@capture',
            ]);

            Route::post('/{order_id}/approve', [
                'as' => 'veltrans.core.approve',
                'uses' => 'CoreAPIController@approve',
            ]);

            Route::post('/{order_id}/deny', [
                'as' => 'veltrans.core.deny',
                'uses' => 'CoreAPIController@deny',
            ]);

            Route::post('/{order_id}/cancel', [
                'as' => 'veltrans.core.cancel',
                'uses' => 'CoreAPIController@cancel',
            ]);

            Route::post('/{order_id}/expire', [
                'as' => 'veltrans.core.expire',
                'uses' => 'CoreAPIController@expire',
            ]);

            Route::post('/{order_id}/refund', [
                'as' => 'veltrans.core.refund',
                'uses' => 'CoreAPIController@refund',
            ]);

            Route::get('/{order_id}/status', [
                'as' => 'veltrans.core.status',
                'uses' => 'CoreAPIController@status',
            ]);

            Route::get('/{order_id}/status/b2b', [
                'as' => 'veltrans.core.status.b2b',
                'uses' => 'CoreAPIController@statusB2B',
            ]);

            Route::get('/card/register', [
                'as' => 'veltrans.core.card.register',
                'uses' => 'CoreAPIController@cardRegister',
            ]);

            Route::get('/point_inquiry/{token_id}', [
                'as' => 'veltrans.core.point_inquiry',
                'uses' => 'CoreAPIController@pointInquiry',
            ]);
        });

        // Notification Route
        Route::post('/notification/handling', [
            'as' => 'veltrans.notification.handling',
            'uses' => 'NotificationController@handling',
        ]);
    }
);
