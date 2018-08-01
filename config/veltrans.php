<?php

return [

    /*
     |
     | ----------------------------------------------------------
     | Veltrans Url Setting
     | ----------------------------------------------------------
     |
     */
    'sandbox_base_url' => 'https://api.sandbox.midtrans.com/v2',

    'production_base_url' => 'https://api.midtrans.com/v2',

    'snap_sandbox_base_url' => 'https://app.sandbox.midtrans.com/snap/v1',

    'snap_production_base_url' => 'https://app.midtrans.com/snap/v1',

    /*
     |
     |-----------------------------------------------------------
     | Veltrans Setting
     |-----------------------------------------------------------
     |
     */

    'merchant_id' => env('VELTRANS_MERCHANT_ID',null),

    'client_key' => env('VELTRANS_CLIENT_KEY',null),

    'server_key' => env('VELTRANS_SERVER_KEY',null),

    'is_production' => env('VELTRANS_IS_PRODUCTION', false),

    'is_sanitized' => env('VELTRANS_IS_SANITIZED', true),

    'is_3ds' => env('VELTRANS_IS_3DS', true),

    /*
     |
     |-----------------------------------------------------------
     | Snap Settings
     |-----------------------------------------------------------
     |
     |
     */

    'enabled_payments' => [
        "credit_card",
        "mandiri_clickpay",
        "cimb_clicks",
        "bca_klikbca",
        "bca_klikpay",
        "bri_epay",
        "echannel",
        "indosat_dompetku",
        "mandiri_ecash",
        "permata_va",
        "bca_va",
        "bni_va",
        "other_va",
        "gopay",
        "kioson",
        "indomaret",
        "gci",
        "danamon_online"
    ],

     /*
     |
     |-----------------------------------------------------------
     | VT-Web Settings
     |-----------------------------------------------------------
     |
     |
     */


     /*
     |
     |-----------------------------------------------------------
     | Core API (VT-Direct) Settings
     |-----------------------------------------------------------
     |
     |
     */

];
