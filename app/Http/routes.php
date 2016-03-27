<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/



/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

$api = app('Dingo\Api\Routing\Router');


$api->version('v1', ['middleware' => ['web']], function ($api) {
    $api->get(null , function() {
        return redirect('/companies');
    });
    $api->post('/user/{user}', 
        'App\Http\Controllers\UserController@edit');
    $api->post('/company', 
        'App\Http\Controllers\CompanyController@store');
    $api->post('/company/{company}', 
        'App\Http\Controllers\CompanyController@edit');
    $api->post('/conversation', 
        'App\Http\Controllers\ConversationController@store');
    $api->get('/conversation/{conversation}', 
        'App\Http\Controllers\ConversationController@editView');
    $api->get('registers', 
        'App\Http\Controllers\CompanyController@register');
    $api->get('user/{user}', 
        'App\Http\Controllers\UserController@editView');
    $api->get('companies',
        'App\Http\Controllers\CompanyController@index');
    $api->get('company/{company}',
        'App\Http\Controllers\CompanyController@editView');
    $api->get('conversations', 
        'App\Http\Controllers\ConversationController@index');
    $api->get('conversation/{conversation}',
        'App\Http\Controllers\ConversationController@editView');
});

