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

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class SnapController
{

    public $server_key;

    public $is_production;

    public $client_key;

    public $is_3ds;

    public $is_sanitized;

    public $client;

    const sandbox_base_url = 'https://api.sandbox.midtrans.com/v2';
    const prodution_base_url = 'https://api.midtrans.com/v2';
    const snap_sandbox_base_url = 'https://app.sandbox.midtrans.com/snap/v1';
    const snap_production_base_url = 'https://app.midtrans.com/snap/v1';

    public function __construct()
    {
        $this->server_key = config('veltrans.server_key');
        $this->is_production = config('veltrans.is_production');
        $this->client_key = config('veltrans.client_key');
        $this->is_3ds = config('veltrans.is_3ds');
        $this->is_sanitized = config('veltrans.is_sanitized');
        $this->client = new Client();
    }

    public function getSnapToken(Request $request)
    {
        $token = $this->processTransaction($request)->token;
        return $token;
    }

    public function processTransaction(Request $request)
    {
        // if ($this->is_sanitized) {
        //     $request = $this->sanitized($reqeust);
        // }

        // Required
        $transaction_details = [
            'order_id' => rand(),
            'gross_amount' => 94000
        ];

        // // Optional
        // $item1_details = [
        //     'id' => 'a1',
        //     'price' => 18000,
        //     'quantity' => 3,
        //     'name' => 'Apple'
        // ];

        // // Optional
        // $item2_details = [
        //     'id' => 'a2',
        //     'price' => 20000,
        //     'quantity' => 2,
        //     'name' => 'Orange'
        // ];

        // // Optional
        // $item_details = [
        //     $item1_details,
        //     $item2_details
        // ];

        // // Optional
        // $billing_address = [
        //     'first_name' => "Endru",
        //     'last_name' => "Tama",
        //     'address' => "Serdang Raya 70",
        //     'city' => "Depok",
        //     'postal_code' => "16421",
        //     'phone' => "081281869602",
        //     'country_code' => "IDN"
        // ];

        // // Optional
        // $shipping_address = [
        //     'first_name' => "Reza",
        //     'last_name' => 'Tama',
        //     'address' => 'KG 20',
        //     'city' => 'Jakarta',
        //     'postal_code' => '16660',
        //     'phone' => '089618712112',
        //     'country_code ' => 'IDN'
        // ];

        // // Optional
        // $customer_details = [
        //     'first_name' => 'Foo',
        //     'last_name' => 'Bar',
        //     'email' => 'foo@bar.com',
        //     'phone' => '0898989889',
        //     'billing_address' => $billing_address,
        //     'shipping_address' => $shipping_address
        // ];
        return $this->fetchResult($request);

    }

    public function sanitized($request)
    {

    }

    public function fetchResult($request)
    {
        $result = $this->client->request(
            'POST',
            $this->getSnapBaseURL().'/transactions',
            [
                'headers' => [
                    'Content-Type' => 'application/json',
                    'Accept' => 'application/json',
                    'Authorization' => 'Basic '. base64_encode($this->server_key, ':')
                ],
                'form_params' => $request
            ]
        );

        dd($result->getBody());
    }

    public function getSnapBaseUrl()
    {
        return $this->is_production ? $this->snap_production_base_url : $this->snap_sandbox_base_url;
    }

}
