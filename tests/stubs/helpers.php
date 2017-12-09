<?php

/**
 * Mock of config helper.
 *
 * @param string $key
 * @return mixed|null
 */
function config($key)
{
    $array = [
        'auth.providers.users.model' => \Bigpaulie\Laravel\Social\Passport\Tests\Stubs\User::class
    ];

    if ( array_key_exists($key, $array) ) {
        return $array[$key];
    }

    return null;
}

/**
 * Mock of bcrypt helper.
 *
 * @param string $string
 * @return string
 */
function bcrypt($string)
{
    return md5(time());
}

