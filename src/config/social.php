<?php

/**
 * Passport Social Login
 * @package bigpaulie\laravel\passport\social
 */

return [
    'facebook' => [
        'id' => env('FACEBOOK_APP_ID'),
        'secret' => env('FACEBOOK_APP_SECRET'),
    ],

    'twitter' => [
        'key' => env('TWITTER_CONSUMER_KEY'),
        'secret' => env('TWITTER_CONSUMER_SECRET')
    ]
];