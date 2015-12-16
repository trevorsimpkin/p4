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

Route::get('/', 'WelcomeController@getIndex');
# Show login form
Route::get('/login', 'Auth\AuthController@getLogin');

# Process login form
Route::post('/login', 'Auth\AuthController@postLogin');

# Process logout
Route::get('/logout', 'Auth\AuthController@getLogout');

# Show registration form
Route::get('/register', 'Auth\AuthController@getRegister');
Route::get('/climbs', 'ClimbController@getIndex');
# Process registration form
Route::post('/register', 'Auth\AuthController@postRegister');
Route::group(['middleware' => 'auth'], function () {
    Route::get('/user/{id?}', 'UserController@getIndex');
    Route::get('/user/addclimb/{id?}', 'UserController@getAddClimb');
    Route::get('/user/removeclimb/{id?}', 'UserController@getRemoveClimb');
    Route::get('/climbs/show/{id?}', 'ClimbController@getShow');
    Route::get('/climbs/create', 'ClimbController@getCreate');
    Route::post('/climbs/create', 'ClimbController@postCreate');
    Route::get('/climbs/edit/{id?}', 'ClimbController@getEdit');
    Route::post('/climbs/edit', 'ClimbController@postEdit');
    Route::get('/climbs/confirm-delete/{id?}', 'ClimbController@getConfirmDelete');
    Route::get('/climbs/delete/{id?}', 'ClimbController@getDoDelete');
    Route::get('/climbs/admin/{id?}', 'ClimbController@getAdmin');
    Route::post('/climbs/admin/', 'ClimbController@postAdmin');


});
