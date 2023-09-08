<?php


if (config('app.env') == 'local') {
    $test_secret = 'test_public_key_0d18dacb606942bab0674931b9480571';
}


return [
    /*
    TEST KEYS
    Public Test key
    */

    'test_public' => $test_secret,

    /*Public Secret key*/
    'test_secret' => 'key 86fd838bc6bd47598cfec74840f8a984',

    /*
    LIVE KEYS
    Public Live key
    */
    'live_public' => 'test_public_key_0d18dacb606942bab0674931b9480571',

    /*Public Secret key*/
    'live_secret_key' => 'test_secret_key_00e98849ed354637bb56526f6413eaa1',
];
