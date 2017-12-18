<?php

namespace Bigpaulie\Laravel\Social\Passport;

use Bigpaulie\Laravel\Social\Passport\Grants\PassportFaceBookGrant;
use Facebook\Facebook;
use Laravel\Passport\Bridge\RefreshTokenRepository;
use Laravel\Passport\Bridge\UserRepository;
use Laravel\Passport\Passport;
use Laravel\Passport\PassportServiceProvider;
use League\OAuth2\Server\AuthorizationServer;

/**
 * Class FacebookPassportProvider
 * @package bigpaulie\laravel\passport\social
 */
class FacebookPassportProvider extends PassportServiceProvider
{

    /**
     * Bootstrap services.
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/config/social.php' => config_path('social.php'),
        ], 'config');

        $this->publishes([
            __DIR__ . '/migrations/' => database_path('migrations'),
        ], 'migrations');

        app(AuthorizationServer::class)->enableGrantType($this->buildRequestGrant(),
            Passport::tokensExpireIn());
    }

    /**
     * Register services.
     * @return void
     */
    public function register()
    {
        parent::register();

        $this->app->bind(Facebook::class, function ($app) {
            return new Facebook([
                'app_id' => config('social.facebook.id'),
                'app_secret' => config('social.facebook.secret'),
                'default_graph_version' => 'v2.5'
            ]);
        });
    }

    /**
     * Build Grant.
     * @return PassportFaceBookGrant
     */
    private function buildRequestGrant()
    {
        $grant = new PassportFaceBookGrant(
            $this->app->make(UserRepository::class),
            $this->app->make(RefreshTokenRepository::class)
        );

        $grant->setRefreshTokenTTL(Passport::refreshTokensExpireIn());

        return $grant;
    }
}