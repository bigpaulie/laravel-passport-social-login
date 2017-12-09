<?php

namespace Bigpaulie\Laravel\Social\Passport\Tests\Stubs;

/**
 * Class User
 * Mock of Laravel's User object.
 *
 * @package Bigpaulie\Laravel\Social\Passport\Tests\Stubs
 */
class User
{

    /**
     * @var string $requestedEmail
     */
    public static $requestedEmail;

    /**
     * @var string $first_name
     */
    public $first_name;

    /**
     * @var string $last_name
     */
    public $last_name;

    /**
     * @var string $email
     */
    public $email;

    /**
     * @var int $facebook_id
     */
    public $facebook_id;

    /**
     * Mock of where method.
     *
     * @param string $column
     * @param string $value
     * @return User
     */
    public static function where($column, $value)
    {
        self::$requestedEmail = $value;
        return new User();
    }

    /**
     * Mock of first method.
     *
     * @return User|null
     */
    public function first()
    {
        if ( self::$requestedEmail == 'test@test.com' ) {
            $user = new User();
            $user->first_name = 'Test';
            $user->last_name = 'Test';
            $user->email = 'test@test.com';

            return $user;
        }

        return null;
    }

    /**
     * Mock of save method.
     *
     * @return bool
     */
    public function save()
    {
        return true;
    }
}