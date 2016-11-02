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

//Route::get('/', function () {
//    return view('welcome');
//});

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

    Route::group(['prefix' => 'admin', 'middleware' => ['admin'], 'namespace' => 'Admin'], function() {

        // Dashboard route
        Route::group(['namespace' => 'Dashboard'], function() {
            Route::get('/','DashboardController@index');
            Route::get('dashboard',['uses' =>'DashboardController@index','as' => 'admin.dashboard.index']);
        });

        // User & role route
        Route::group(['namespace' => 'User'], function() {
            Route::put('service/user/toggle', 'UserController@toggleState')->name('admin.user.toggle');
            Route::resource('user', 'UserController');
            Route::put('user/{id}/change-password', ['as' => 'admin.user.change-password', 'uses' => 'UserController@changePassword']);

            Route::resource('role', 'RoleController');
            Route::put('service/role/toggle', 'RoleController@toggleState')->name('admin.role.toggle');
        });
    });

    // Admin auth
    Route::group(['prefix' => 'admin'], function () {
        Route::get('login', 'Auth\AuthController@getLogin')->name('admin.login.get');
    });

});

Route::group(['middleware' => 'web'], function () {
    Route::auth();
    Route::get('menu', 'TestController@menu');
});
