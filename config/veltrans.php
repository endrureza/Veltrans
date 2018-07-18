<?php

return [

    /*
     |
     |-----------------------------------------------------------
     | Veltrans Settings
     |-----------------------------------------------------------
     |
     */

    'merchant_id' => env('VELTRANS_MERCHANT_ID',null),

    'client_key' => env('VELTRANS_CLIENT_KEY',null),

    'server_key' => env('VELTRANS_SERVER_KEY',null),

    'is_production' => env('VELTRANS_IS_PRODUCTION', false),

    'is_sanitized' => env('VELTRANS_IS_SANITIZED', true),

    'is_3ds' => env('VELTRANS_IS_3DS', true)

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