<?php

/**
 * Define the config helper.
 */
if ( !function_exists('config') ) {
    /**
     * Mock of config helper.
     *
     * @param string $key
     * @return mixed|null
     */
    function config($key)
    {
        return Bigpaulie\Laravel\Social\Passport\Tests\Stubs\User::class;
    }
}

/**
 * Define the bcrypt helper.
 */
if ( !function_exists('bcrypt') ) {
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
}

if ( !function_exists('event') ) {
    function event($event)
    {
        return [];
    }
}

