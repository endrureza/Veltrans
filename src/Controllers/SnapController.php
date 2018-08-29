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

namespace Endru\Veltrans\Controllers;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SnapController
{
    public function __construct()
    {
        $this->client = new Client();
    }

    public function createTransaction(Request $request)
    {
        $params = $this->processRequest($request);

        return $this->fetchResult($params);
    }

    public function processRequest(Request $request)
    {
        // Transaction Details (Required)
        $transaction_details = [
            'order_id' => $request->order_id,
            'gross_amount' => $request->gross_amount,
        ];

        // Item Details
        $item_details = [];

        if ($request->item_details) {
            foreach ($request->item_details as $item) {
                $item_details[] = [
                    'id' => $item['id'],
                    'price' => $item['price'],
                    'quantity' => $item['quantity'],
                    'name' => $item['name'],
                ];
            }
        }

        // Customer Details
        $customer_details = [];

        $billing_address = [];

        if ($request->billing_address) {
            $billing_address = [
                'first_name' => $request->billing_address['first_name'],
                'last_name' => $request->billing_address['last_name'],
                'email' => $request->billing_address['email'],
                'phone' => $request->billing_address['phone'],
                'address' => isset($request->billing_address['address']) ? $request->billing_address['address'] : '',
            ];
        }

        $shipping_address = [];

        if ($request->shipping_address) {
            $shipping_address = [
                'first_name' => $request->shipping_address['first_name'],
                'last_name' => $request->shipping_address['last_name'],
                'email' => $request->shipping_address['email'],
                'phone' => $request->shipping_address['phone'],
                'address' => isset($request->shipping_address['address']) ? $request->shipping_address['address'] : '',
            ];
        }

        if ($request->customer_details) {
            $customer_details[] = [
                'first_name' => $request->customer_details['first_name'],
                'last_name' => $request->customer_details['last_name'],
                'email' => $request->customer_details['email'],
                'phone' => $request->customer_details['phone'],
                'billing_address' => $billing_address,
                'shipping_address' => $shipping_address,
            ];
        }

        $params = [
            'transaction_details' => $transaction_details,
            'customer_details' => $customer_details,
            'item_details' => $item_details,
            'enabled_payments' => config('veltrans.enabled_payments'),
        ];
        
        return $params;
    }

    public function fetchResult($params)
    {
        try {
            $result = $this->client->request(
                'POST',
                $this->getSnapBaseURL() . '/transactions',
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
                    'message' => $message
                ]
            ];

            return response()->json($message, $status_code);
        }
    }

    public function getSnapBaseUrl()
    {
        return config('veltrans.is_production') ? config('veltrans.snap_production_base_url') : config('veltrans.snap_sandbox_base_url');
    }

}
