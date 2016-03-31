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

//Using out of the Box router for getting views
Route::group(['middleware' => ['web']], function (){
    Route::get(null , function() {
        return redirect('/companies');
    });
    Route::get('conversation/{conversation}', 'ConversationController@editView');
    Route::get('registers', 'CompanyController@register');
    Route::get('user/{user}', 'UserController@editView');
    Route::get('companies','CompanyController@index');
    Route::get('company/{company}','CompanyController@editView');
    Route::get('conversations', 'ConversationController@index');
    Route::get('conversation/{conversation}','ConversationController@editView');
    Route::get('questions', 'QuestionController@index');
    Route::auth();
});

$api->version('v1', function ($api) {

    $api->group(['middleware' => 'web'], function ($api) {
        $api->post('/user/{user}', 
            'App\Http\Controllers\UserController@edit');
        $api->post('/company', 
            'App\Http\Controllers\CompanyController@store');
        $api->post('/company/{company}', 
            'App\Http\Controllers\CompanyController@edit');
        $api->post('/conversation', 
            'App\Http\Controllers\ConversationController@store');
        $api->post('/conversation/{conversation}', 
            'App\Http\Controllers\ConversationController@edit');
    

        // $api->get('registers', 
        //     'App\Http\Controllers\CompanyController@register');
        // $api->get('user/{user}', 
        //     'App\Http\Controllers\UserController@editView');
        // $api->get('companies',
        //     'App\Http\Controllers\CompanyController@index');
        // $api->get('company/{company}',
        //     'App\Http\Controllers\CompanyController@editView');
        // $api->get('conversations', 
        //     'App\Http\Controllers\ConversationController@index');
        // $api->get('conversation/{conversation}',
        //     'App\Http\Controllers\ConversationController@editView');
    });
});

