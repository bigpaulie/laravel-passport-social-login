<?php

namespace Bigpaulie\Laravel\Social\Passport\Contracts;

use Abraham\TwitterOAuth\TwitterOAuth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Facebook\Facebook;
use League\OAuth2\Server\Exception\OAuthServerException;

/**
 * Trait SocialPassport
 * @package bigpaulie\laravel\passport\social
 */
trait SocialPassport
{

    /**
     * Login with Facebook.
     *
     * @param Request $request
     * @return Model|null
     * @throws OAuthServerException
     */
    public function loginWithFacebook(Request $request)
    {

        try {

            if ( $request->has('facebook_token') ) {
                $facebook = new Facebook([
                    'app_id' => config('social.facebook.id'),
                    'app_secret' => config('social.facebook.secret'),
                    'default_graph_version' => 'v2.5'
                ]);

                $facebook->setDefaultAccessToken($request->get('facebook_token'));

                /**
                 * Request data from Facebook
                 */
                $response = $facebook->get('/me?locale=en_GB&fields=first_name,last_name,email');
                $facebookUser = $response->getDecodedBody();

                $userModel = config('auth.providers.users.model');

                /**
                 * Check if the user already has an account with us
                 * if not, create a new account with data from Facebook
                 */
                $user = $userModel::where('email', $facebookUser['email'])->first();

                if ( !$user ) {
                    $user = new $userModel();
                    $user->facebook_id = $facebookUser['id'];
                    $user->first_name = $facebookUser['first_name'];
                    $user->last_name = $facebookUser['last_name'];
                    $user->email = $facebookUser['email'];
                    $user->password = bcrypt(str_random(7));

                    $user->save();
                }

                return $user;
            }

        } catch (\Exception $exception) {
            throw OAuthServerException::accessDenied($exception->getMessage());
        }

        return null;
    }

    public function loginWithTwitter(Request $request)
    {
        $connection = new TwitterOAuth(
            config('social.twitter.key'),
            config('social.twitter.secret'),
            $request->get('twitter_token'),
            $request->get('twitter_secret')
        );
        $content = $connection->get("account/verify_credentials", [
            'include_entities' => "false",
            'skip_status' => "true",
            'include_email' => "true"
        ]);

        die(var_dump($content));
    }
}