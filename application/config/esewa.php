<?php

return [
    'merchant_code'=>  env('ESEWA_MERCHANT_CODE', 'EPAYTEST'),
    'client_id' => env('ESEWA_CLIENT_ID', 'B0BBQ4aD0UqIThFJwAKBgAXEUkEGQUBBAwdOgABHD4DChwUAB0R'),
    'secret' => env('ESEWA_SECRET', 'BhwIWQQADhIYSxILExMcAgFXFhcOBwAKBgAXEQ=='),
    'settings' => array(
        'mode' => env('ESEWA_MODE', 'sandbox'),
        'http.ConnectionTimeOut' => 30,
        'log.LogEnabled' => true,
        'log.FileName' => storage_path() . '/logs/esewa.log',
        'log.LogLevel' => 'ERROR'
    ),
];

