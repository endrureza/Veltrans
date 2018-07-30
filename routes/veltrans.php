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

Route::group(['prefix' => 'veltrans', 'namespace' => 'Endru\Veltrans\Controllers'], function () {

    // Snap Route
    Route::group(['prefix' => 'snap'], function () {
        Route::post('/get_snap_token', [
            'as' => 'veltrans.snap.get_snap_token',
            'uses' => 'SnapController@getSnapToken',
        ]);
    });

    // VTWeb Route
    Route::group(['prefix' => 'vtweb'], function () {
        Route::get('/', [
            'as' => 'veltrans.vtweb',
            'uses' => 'VTWebController@index',
        ]);
    });

    // Core API Route
    Route::group(['prefix' => 'core'], function () {
        Route::get('/', [
            'as' => 'veltrans.core',
            'uses' => 'CoreAPIController@index',
        ]);
    });

    // Transaction Route
    Route::group(['prefix' => 'transaction'], function () {
        Route::get('/{transaction_id}/status', [
            'as' => 'veltrans.transaction.status',
            'uses' => 'TransactionController@getStatus'
        ]);

        Route::post('/{transaction_id}/approve', [
            'as' => 'veltrans.transaction.approve',
            'uses' => 'TransactionController@approveTransaction'
        ]);

        Route::post('/{transaction_id}/cancel', [
            'as' => 'veltrans.transaction.cancel',
            'uses' => 'TransactionController@cancelTransaction'
        ]);

        Route::post('/{transaction_id}/expire', [
            'as' => 'veltrans.transaction.expire',
            'uses' => 'TransactionController@expireTransaction'
        ]);
    });
});
