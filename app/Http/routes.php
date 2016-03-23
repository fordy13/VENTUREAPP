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

Route::group(['middleware' => ['web']], function () {

    Route::get('/', function() {
        return redirect('/companies');
    })->middleware('guest');

    Route::get('/registers', 'CompanyController@register');//gross

    Route::get('/user/{user}', 'UserController@editView');
    Route::post('user/{user}', 'UserController@edit');

    Route::get('/companies', 'CompanyController@index');
    Route::post('/company', 'CompanyController@store');
    Route::get('/company/{company}', 'CompanyController@editView');
    Route::post('/company/{company}', 'CompanyController@edit');

    Route::get('/conversations', 'ConversationController@index');
    Route::post('/conversation', 'ConversationController@store');
    Route::get('/conversation/{conversation}', 'ConversationController@editView');
    Route::post('/conversation/{conversation}', 'ConversationController@edit');

    Route::auth();

});
