<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

$api = app('Dingo\Api\Routing\Router');

Route::get('/', function () {
    return view('welcome');
});

/*
$api->version('v1', function ($api) {
    $api->get('hello', function () {
        return 'It is ok';
    });
});
*/

$api->version('v1', function ($api) {
    $api->get('hello', 'App\Http\Controllers\HomeController@index');
    $api->get('users/{user_id}/roles/{role_name}', 'App\Http\Controllers\HomeController@attachUserRole');
    $api->get('users/{user_id}/roles', 'App\Http\Controllers\HomeController@getUserRole');
    $api->post('role/permission/add', 'App\Http\Controllers\HomeController@attachPermission');
    $api->get('roles/{role}/permissions', 'App\Http\Controllers\HomeController@getPermissions');
    $api->post('authenticate','App\Http\Controllers\Auth\AuthController@authenticate');
    $api->post('authenticate1','App\Http\Controllers\Auth\AuthController@authenticate1');


});

$api->version('v1', ['middleware'=>'api.auth'], function ($api) {
    $api->get('users', 'App\Http\Controllers\HomeController@index');
    $api->get('users/{id}', 'App\Http\Controllers\Auth\AuthController@showUser');
});