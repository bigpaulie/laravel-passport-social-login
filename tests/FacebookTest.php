<?php

namespace Bigpaulie\Laravel\Social\Passport\Tests;

use Bigpaulie\Laravel\Social\Passport\Contracts\SocialPassport;
use Bigpaulie\Laravel\Social\Passport\Tests\Stubs\User;
use Facebook\Facebook;
use Illuminate\Http\Request;
use Mockery as Mock;

/**
 * Class FacebookTest
 * @package Bigpaulie\Laravel\Social\Passport\Tests
 */
class FacebookTest extends TestCase
{

    use SocialPassport;

    /**
     * Mock Facebook instance.
     *
     * @var Facebook $facekbook
     */
    private $facekbook;

    /**
     * Mock Request instance.
     *
     * @var Request $request
     */
    private $request;

    /**
     * Setup the test
     */
    public function setUp()
    {
        $this->request = Mock::mock(Request::class);
        $this->facekbook = Mock::mock(Facebook::class);
    }

    /**
     * This test should pass
     * This test will cover the use case where a user already has an account.
     */
    public function testLoginWithFacebookForExistingUser()
    {
        $this->facebookRequestMock([
            'id' => '1234567890',
            'first_name' => 'Test',
            'last_name' => 'Test',
            'email' => 'test@test.com'
        ]);

        $user = $this->loginWithFacebook($this->request, $this->facekbook);

        /**
         * Test if the result is an instance of the mock User class.
         */
        $this->assertInstanceOf(User::class, $user);

        /**
         * Check if the email is correct.
         */
        $this->assertEquals('test@test.com', $user->email);
    }

    /**
     * This test should pass
     * This test will cover the use case where a user doesn't have an account.
     */
    public function testLoginWithFacebookForNonExistingUser()
    {
        $this->facebookRequestMock([
            'id' => '1234567890',
            'first_name' => 'Test',
            'last_name' => 'Test',
            'email' => 'second@test.com'
        ]);

        $user = $this->loginWithFacebook($this->request, $this->facekbook);

        /**
         * Test if the result is an instance of the mock User class.
         */
        $this->assertInstanceOf(User::class, $user);

        /**
         * Check if the email is correct.
         */
        $this->assertEquals('second@test.com', $user->email);
    }

    /**
     * Mock of Facebook request
     * @param array $array
     * @return void
     */
    private function facebookRequestMock($array)
    {
        $this->request->shouldReceive('has')->with('facebook_token')
            ->once()->andReturn('facebooktestkey');
        $this->request->shouldReceive('get')->with('facebook_token')
            ->once()->andReturn('facebooktestkey');

        $this->facekbook->shouldReceive('setDefaultAccessToken')->once();
        $this->facekbook->shouldReceive('get')->with('/me?locale=en_GB&fields=first_name,last_name,email')
            ->once()->andReturn($this->facekbook);
        $this->facekbook->shouldReceive('getDecodedBody')->once()->andReturn($array);
    }

    /**
     * Tear down the test
     */
    public function tearDown()
    {
        Mock::close();
    }
}