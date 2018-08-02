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

namespace Endru\Veltrans\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\ServerException;

class CoreAPIController
{
    public function __construct()
    {
        $this->client = new Client();
    }

    /**
     * Tokenize Credit Card information
     * before being charged
     *
     * @return void
     */
    public function token()
    {

    }

    /**
     * Perform a transaction with various
     * available payment methods and features
     *
     * @param Request $request
     * @return void
     */
    public function charge(Request $request)
    {

    }

    /**
     * Capture an authorized transaction
     * for card payment
     *
     * @param Request $request
     * @return void
     */
    public function capture(Request $request)
    {

    }

    /**
     * Approve a transaction with certain
     * order_id
     * which gets challange status from
     * Fraud Detection System
     *
     * @param Request $request
     * @param integer $order_id
     * @return void
     */
    public function approve(Request $request, int $order_id)
    {

    }

    /**
     * Deny a transaction with certain
     * order_id
     * which gets challange status from
     * Fraud Detection System
     *
     * @param Request $request
     * @param integer $order_id
     * @return void
     */
    public function deny(Request $request, int $order_id)
    {

    }

    /**
     * Cancel a transaction with certain
     * order_id
     * Cancelation can only be done before
     * settlement process
     *
     * @param Request $request
     * @param integer $order_id
     * @return boolean
     */
    public function cancel(Request $request, int $order_id)
    {

    }

    /**
     * Changing order_id with
     * pending status to be expired
     *
     * @param Request $request
     * @param integer $order_id
     * @return void
     */
    public function expire(Request $request, int $order_id)
    {

    }

    /**
     * Changing order_id with
     * settlement status to be refund
     *
     * @param Request $request
     * @param integer $order_id
     * @return void
     */
    public function refund(Request $request, int $order_id)
    {

    }

    /**
     * Get information status of a transaction
     * with certain order_id
     *
     * @param integer $order_id
     * @return void
     */
    public function status(int $order_id)
    {

    }

    /**
     * Get information status of multiple b2b
     * transactions related to certain order_id
     *
     * @param integer $order_id
     * @return void
     */
    public function statusB2B(int $order_id)
    {

    }

    /**
     * Register card information (card number and expiry)
     * to be used for two clicks and one click
     */
    public function cardRegister()
    {

    }

    /**
     * Get the point balance of the card
     * in denomination amount
     *
     * @param string $token_id
     * @return void
     */
    public function pointInquiry(string $token_id)
    {

    }
}
