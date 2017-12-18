# Laravel social passport 
[![Build Status](https://travis-ci.org/bigpaulie/laravel-social-passport.svg?branch=master)](https://travis-ci.org/bigpaulie/laravel-social-passport) [![Latest Stable Version](https://poser.pugx.org/bigpaulie/laravel-social-passport/v/stable)](https://packagist.org/packages/bigpaulie/laravel-social-passport) [![Total Downloads](https://poser.pugx.org/bigpaulie/laravel-social-passport/downloads)](https://packagist.org/packages/bigpaulie/laravel-social-passport) [![Latest Unstable Version](https://poser.pugx.org/bigpaulie/laravel-social-passport/v/unstable)](https://packagist.org/packages/bigpaulie/laravel-social-passport) [![License](https://poser.pugx.org/bigpaulie/laravel-social-passport/license)](https://packagist.org/packages/bigpaulie/laravel-social-passport) [![composer.lock](https://poser.pugx.org/bigpaulie/yii2-social-share/composerlock)](https://packagist.org/packages/bigpaulie/laravel-social-passport)

This project is ideal for applications where the front-end is decoupled from the back-end such as vue.js, angular, cordova, etc. Providing stateless social authentication via Laravel's Passport library.

### Installation
Install social passport via composer

```bash
  composer require bigpaulie/laravel-social-passport
```
Publish package resources.
```bash
php artisan vendor:publish
```
Run the migrations
```bash
php artisan migrate
```

### Supported networks
* Facebook

### Basic usage
By using the package I assume that you've already installed and configured laravel/passport package.

#### Facebook
At this moment I assume that your user table has a first_name and a last_name column, the migration file will automatically add a facebook_id column.

Add the FacebookPassportProvider to you config/app.php providers array
```php
\Bigpaulie\Laravel\Social\Passport\FacebookPassportProvider::class,
```
Add the SocialPassport contract to your user model.
```php
use SocialPassport;
```
From this moment onward you are ready to use Facebook's access token to authenticate your users.

Send a POST request to oauth/token with the following body

```json
{
	"grant_type": "facebook_login",
	"client_id": "<passport_client_id>",
	"client_secret": "<passport_client_secret>",
	"facebook_token": "<facebook_access_token>"
}
```

*Pay attention to the "grant_type" key*

### Dependencies
In order for this project to function properly some extra packages are needed.

* [facebook/graph-sdk](https://github.com/facebook/php-graph-sdk)
* [abraham/twitteroauth](https://github.com/abraham/twitteroauth)

### Road map
The following features will be added in the future.

* Twitter authentication
* Github authentication
* Google authentication
* Events

### Contributions
Contributions are most welcomed as long as you follow the existing code style and testing pattern.

Please feel free to fork, code and submit a pull request