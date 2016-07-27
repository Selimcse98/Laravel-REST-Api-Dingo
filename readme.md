# Laravel PHP Framework

[![Build Status](https://travis-ci.org/laravel/framework.svg)](https://travis-ci.org/laravel/framework)
[![Total Downloads](https://poser.pugx.org/laravel/framework/d/total.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Stable Version](https://poser.pugx.org/laravel/framework/v/stable.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Unstable Version](https://poser.pugx.org/laravel/framework/v/unstable.svg)](https://packagist.org/packages/laravel/framework)
[![License](https://poser.pugx.org/laravel/framework/license.svg)](https://packagist.org/packages/laravel/framework)

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable, creative experience to be truly fulfilling. Laravel attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as authentication, routing, sessions, queueing, and caching.

Laravel is accessible, yet powerful, providing tools needed for large, robust applications. A superb inversion of control container, expressive migration system, and tightly integrated unit testing support give you the tools you need to build any application with which you are tasked.

## Official Documentation

Documentation for the framework can be found on the [Laravel website](http://laravel.com/docs).

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](http://laravel.com/docs/contributions).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell at taylor@laravel.com. All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).

====================================//////////////////////////#################================================================
locale: /Users/mohammadselimmiah/Sites/Api/ApiDingo
https://tuts.codingo.me/dingo-api-quick-start
https://www.youtube.com/watch?v=r40yAZAi6PQ&list=PLpvpznviFFFJUWlHylwipLLr1iLYs-cft

Add "phpdocumentor/reflection": "3.x@dev" under "require": { } in composer.json and run a composer update

"require": {
        "php": ">=5.5.9",
        "laravel/framework": "5.2.*",
        "phpdocumentor/reflection": "3.x@dev"
},

$ composer update
$ composer require dingo/api:1.0.x@dev

after successful command this will add "dingo/api": "1.0.x@dev" under require.

"require": {
        "php": ">=5.5.9",
        "laravel/framework": "5.2.*",
        "phpdocumentor/reflection": "3.x@dev",
        "dingo/api": "1.0.x@dev"
}

add in Config\app.php service providers
Dingo\Api\Provider\LaravelServiceProvider::class

$ php artisan vendor:publish --provider="Dingo\Api\Provider\LaravelServiceProvider"
Copied File [/vendor/dingo/api/config/api.php] To [/config/api.php]
Publishing complete for tag []!

add following variables to .env:
API_STANDARDS_TREE=vnd
API_SUBTYPE=dingo-api-guide
API_DOMAIN=dingo-api-definitive-guide.dev
API_VERSION=v1
API_NAME="Dingo API Definitive Guide"

'debug' => env('API_DEBUG', true),

routes.php.
$api = app('Dingo\Api\Routing\Router');

$api->version('v1', function ($api) {

    $api->get('hello', function () {
        return 'It is ok';
    });

});


$ php artisan api:route

take the route uri and browse
http://localhost:8000/api/hello

Create HomeController
$ php artisan make:controller HomeController --resource

add the HomeController with namespace otherwise it will through error

$api->version('v1', function ($api) {
    $api->get('hello', 'App\Http\Controllers\HomeController@index');
});



