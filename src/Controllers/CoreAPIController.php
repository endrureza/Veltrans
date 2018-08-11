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
use GuzzleHttp\Exception\ClientException;
use Illuminate\Http\Request;
use Log;

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
        try {
            $params = [
                'transaction_id' => $request->transaction_id,
                'gross_amount' => $request->gross_amount,
            ];

            $result = $this->client->request(
                'POST',
                $this->getBaseUrl() . '/capture',
                [
                    'verify' => __DIR__ . '/../../resources/data/cacert.pem',
                    'headers' => [
                        'Content-Type' => 'application/json',
                        'Accept' => 'application/json',
                        'Authorization' => 'Basic ' . base64_encode(config('veltrans.server_key') . ':'),
                    ],
                    'json' => $params,
                ]
            );

            $status_code = $result->getStatusCode();
            $response = $result->getBody()->getContents();
            $response = json_decode($response);

            return response()->json($response, $status_code);
        } catch (ClientException $e) {
            Log::error($e);

            $status_code = $e->getCode();
            $message = $e->getMessage();

            $message = [
                'error' => [
                    'http_code' => $status_code,
                    'message' => $message,
                ],
            ];

            return response()->json($message, $status_code);
        }
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
    public function approve(Request $request, string $order_id)
    {
        try {
            $result = $this->client->request(
                'POST',
                $this->getBaseUrl() . '/' . $order_id . '/approve',
                [
                    'verify' => __DIR__ . '/../../resources/data/cacert.pem',
                    'headers' => [
                        'Content-Type' => 'application/json',
                        'Accept' => 'application/json',
                        'Authorization' => 'Basic ' . base64_encode(config('veltrans.server_key') . ':'),
                    ],
                ]
            );

            $status_code = $result->getStatusCode();
            $response = $result->getBody()->getContents();
            $response = json_decode($response);

            return response()->json($response, $status_code);
        } catch (ClientException $e) {
            Log::error($e);

            $status_code = $e->getCode();
            $message = $e->getMessage();

            $message = [
                'error' => [
                    'http_code' => $status_code,
                    'message' => $message,
                ],
            ];

            return response()->json($message, $status_code);
        }
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
    public function deny(Request $request, string $order_id)
    {
        try {
            $result = $this->client->request(
                'POST',
                $this->getBaseUrl() . '/' . $order_id . '/deny',
                [
                    'verify' => __DIR__ . '/../../resources/data/cacert.pem',
                    'headers' => [
                        'Content-Type' => 'application/json',
                        'Accept' => 'application/json',
                        'Authorization' => 'Basic ' . base64_encode(config('veltrans.server_key') . ':'),
                    ],
                ]
            );

            $status_code = $result->getStatusCode();
            $response = $result->getBody()->getContents();
            $response = json_decode($response);

            return response()->json($response, $status_code);
        } catch (ClientException $e) {
            Log::error($e);

            $status_code = $e->getCode();
            $message = $e->getMessage();

            $message = [
                'error' => [
                    'http_code' => $status_code,
                    'message' => $message,
                ],
            ];

            return response()->json($message, $status_code);
        }
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
    public function cancel(Request $request, string $order_id)
    {
        try {
            $result = $this->client->request(
                'POST',
                $this->getBaseUrl() . '/' . $order_id . '/cancel',
                [
                    'verify' => __DIR__ . '/../../resources/data/cacert.pem',
                    'headers' => [
                        'Content-Type' => 'application/json',
                        'Accept' => 'application/json',
                        'Authorization' => 'Basic ' . base64_encode(config('veltrans.server_key') . ':'),
                    ],
                ]
            );

            $status_code = $result->getStatusCode();
            $response = $result->getBody()->getContents();
            $response = json_decode($response);

            return response()->json($response, $status_code);
        } catch (ClientException $e) {
            Log::error($e);

            $status_code = $e->getCode();
            $message = $e->getMessage();

            $message = [
                'error' => [
                    'http_code' => $status_code,
                    'message' => $message,
                ],
            ];

            return response()->json($message, $status_code);
        }
    }

    /**
     * Changing order_id with
     * pending status to be expired
     *
     * @param Request $request
     * @param integer $order_id
     * @return void
     */
    public function expire(Request $request, string $order_id)
    {
        try {
            $result = $this->client->request(
                'POST',
                $this->getBaseUrl() . '/' . $order_id . '/expire',
                [
                    'verify' => __DIR__ . '/../../resources/data/cacert.pem',
                    'headers' => [
                        'Content-Type' => 'application/json',
                        'Accept' => 'application/json',
                        'Authorization' => 'Basic ' . base64_encode(config('veltrans.server_key') . ':'),
                    ],
                ]
            );

            $status_code = $result->getStatusCode();
            $response = $result->getBody()->getContents();
            $response = json_decode($response);

            return response()->json($response, $status_code);
        } catch (ClientException $e) {
            Log::error($e);

            $status_code = $e->getCode();
            $message = $e->getMessage();

            $message = [
                'error' => [
                    'http_code' => $status_code,
                    'message' => $message,
                ],
            ];

            return response()->json($message, $status_code);
        }
    }

    /**
     * Changing order_id with
     * settlement status to be refund
     *
     * @param Request $request
     * @param integer $order_id
     * @return void
     */
    public function refund(Request $request, string $order_id)
    {
        try {
            $result = $this->client->request(
                'POST',
                $this->getBaseUrl() . '/' . $order_id . '/refund',
                [
                    'verify' => __DIR__ . '/../../resources/data/cacert.pem',
                    'headers' => [
                        'Content-Type' => 'application/json',
                        'Accept' => 'application/json',
                        'Authorization' => 'Basic ' . base64_encode(config('veltrans.server_key') . ':'),
                    ],
                ]
            );

            $status_code = $result->getStatusCode();
            $response = $result->getBody()->getContents();
            $response = json_decode($response);

            return response()->json($response, $status_code);
        } catch (ClientException $e) {
            Log::error($e);

            $status_code = $e->getCode();
            $message = $e->getMessage();

            $message = [
                'error' => [
                    'http_code' => $status_code,
                    'message' => $message,
                ],
            ];

            return response()->json($message, $status_code);
        }
    }

    /**
     * Get information status of a transaction
     * with certain order_id
     *
     * @param integer $order_id
     * @return void
     */
    public function status(string $order_id)
    {
        try {
            $result = $this->client->request(
                'GET',
                $this->getBaseUrl() . '/' . $order_id . '/status',
                [
                    'verify' => __DIR__ . '/../../resources/data/cacert.pem',
                    'headers' => [
                        'Content-Type' => 'application/json',
                        'Accept' => 'application/json',
                        'Authorization' => 'Basic ' . base64_encode(config('veltrans.server_key') . ':'),
                    ],
                ]
            );

            $status_code = $result->getStatusCode();
            $response = $result->getBody()->getContents();
            $response = json_decode($response);

            return response()->json($response, $status_code);
        } catch (ClientException $e) {
            Log::error($e);

            $status_code = $e->getCode();
            $message = $e->getMessage();

            $message = [
                'error' => [
                    'http_code' => $status_code,
                    'message' => $message,
                ],
            ];

            return response()->json($message, $status_code);
        }
    }

    /**
     * Get information status of multiple b2b
     * transactions related to certain order_id
     *
     * @param integer $order_id
     * @return void
     */
    public function statusB2B(string $order_id)
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

    protected function getBaseUrl()
    {
        return config('veltrans.is_production') ? config('veltrans.core_api_production_base_url') : config('veltrans.core_api_sandbox_base_url');
    }
}
