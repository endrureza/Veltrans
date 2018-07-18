<?php

return [

    /*
     |
     |-----------------------------------------------------------
     | Veltrans Settings
     |-----------------------------------------------------------
     |
     */

    'merchant_id' => env('MIDTRANS_MERCHANT_ID',null),

    'client_key' => env('MIDTRANS_CLIENT_KEY',null),

    'server_key' => env('MIDTRANS_SERVER_KEY',null),

    'is_production' => env('MIDTRANS_IS_PRODUCTION', false),

    'is_sanitized' => env('MIDTRANS_IS_SANITIZED', true),

    'is_3ds' => env('MIDTRANS_IS_3DS', true)

    /*
     |
     |-----------------------------------------------------------
     | Snap Settings
     |-----------------------------------------------------------
     |
     |
     */


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