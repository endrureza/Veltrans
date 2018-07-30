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

class SnapController
{
    public function __construct()
    {
        $this->client = new Client();
    }

    public function getSnapToken(Request $request)
    {
        return $this->createTransaction($request)->token;
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

        if ($request->customer_details) {
            foreach ($request->customer_details as $customer) {
                $customer_details[] = [
                    'first_name' => 'Endru',
                    'last_name' => 'Tama',
                    'email' => 'endrureza@gmail.com',
                    'phone' => '081212121',
                ];
            }
        }

        $params = [
            'transaction_details' => $transaction_details,
            'customer_details' => $customer_details,
            'item_details' => $item_details,
        ];

        $params = [
            'transaction_details' => $transaction_details
        ];

        return $params;
    }

    public function fetchResult($params)
    {
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
                'json' => $params
            ]
        );

        $status_code = $result->getStatusCode();
        $response = $result->getBody()->getContents();
        $response = json_decode($response);

        return $response;
    }

    public function getSnapBaseUrl()
    {
        return config('veltrans.is_production') ? config('veltrans.snap_production_base_url') : config('veltrans.snap_sandbox_base_url');
    }

}
