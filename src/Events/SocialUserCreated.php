<?php

namespace Bigpaulie\Laravel\Social\Passport\Events;
use Illuminate\Queue\SerializesModels;
use App\User;

/**
 * Class UserCreated
 * @package Bigpaulie\Laravel\Social\Passport\Events
 */
class SocialUserCreated
{

    use SerializesModels;

    /**
     * The User Object.
     *
     * @var mixed $user
     */
    public $user;

    /**
     * The clear text password.
     *
     * @var string|null $clearText
     */
    public $clearText;

    /**
     * UserCreated constructor.
     * @param mixed $user
     * @param null|string $clearText
     */
    public function __construct($user, $clearText = null)
    {
        $this->user = $user;
        $this->clearText = $clearText;
    }
}