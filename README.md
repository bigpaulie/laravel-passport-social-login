# Laravel social passport 
[![Build Status](https://travis-ci.org/bigpaulie/laravel-social-passport.svg?branch=master)](https://travis-ci.org/bigpaulie/laravel-social-passport) [![Latest Stable Version](https://poser.pugx.org/bigpaulie/laravel-social-passport/v/stable)](https://packagist.org/packages/bigpaulie/laravel-social-passport) [![Total Downloads](https://poser.pugx.org/bigpaulie/laravel-social-passport/downloads)](https://packagist.org/packages/bigpaulie/laravel-social-passport) [![Latest Unstable Version](https://poser.pugx.org/bigpaulie/laravel-social-passport/v/unstable)](https://packagist.org/packages/bigpaulie/laravel-social-passport) [![License](https://poser.pugx.org/bigpaulie/laravel-social-passport/license)](https://packagist.org/packages/bigpaulie/laravel-social-passport) [![composer.lock](https://poser.pugx.org/bigpaulie/yii2-social-share/composerlock)](https://packagist.org/packages/bigpaulie/laravel-social-passport)

This project is ideal for applications where the front-end is decoupled from the back-end such as vue.js, angular, cordova, etc.

This package is intended to be used just like your would use passport with the password grant request

### Installation
Install social passport via composer

```bash
  composer require bigpaulie/laravel-social-passport
```

### Supported networks
* Facebook
* Twitter

### Basic usage
By using the package I assume that you've already installed and configured laravel/passport package.

#### Facebook
Add the FacebookPassportProvider to you config/app.php providers array
```php
\Bigpaulie\Laravel\Social\Passport\FacebookPassportProvider::class,
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