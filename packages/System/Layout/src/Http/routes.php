<?php


Route::group(['prefix' => 'admin', 'middleware' => ['web', 'admin'], 'namespace' => 'System\Layout\Http\Controllers'], function () {

		Route::get("slide", ['as' => "admin.slide.index", 'uses' => 'ImageController@index']);
        Route::get("slide/{id}", ['as' => "admin.slide.show", 'uses' => 'ImageController@show']);
        Route::get("slide/create", ['as' => "admin.slide.create", 'uses' => 'ImageController@create']);
        Route::post("slide", ['as' => "admin.slide.store", 'uses' => 'ImageController@store']);
        Route::get("slide/{id}/edit", ['as' => "admin.slide.edit", 'uses' => 'ImageController@edit']);
        Route::put("slide/", ['as' => "admin.slide.updates", 'uses' => 'ImageController@updates']);
        Route::put("slide/{id}/", ['as' => "admin.slide.update", 'uses' => 'ImageController@update']);
        Route::delete("slide", ['as' => "admin.slide.destroy", 'uses' => 'ImageController@destroy']);
        Route::put("layout/slide/toggle", ['as' => "admin.slide.toggle", 'uses' => 'ImageController@toggleState']);


        Route::get("banner", ['as' => "admin.banner.index", 'uses' => 'ImageController@index']);
        Route::get("banner/{id}", ['as' => "admin.banner.show", 'uses' => 'ImageController@show']);
        Route::get("banner/create", ['as' => "admin.banner.create", 'uses' => 'ImageController@create']);
        Route::post("banner", ['as' => "admin.banner.store", 'uses' => 'ImageController@store']);
        Route::get("banner/{id}/edit", ['as' => "admin.banner.edit", 'uses' => 'ImageController@edit']);
        Route::put("banner/", ['as' => "admin.banner.updates", 'uses' => 'ImageController@updates']);
        Route::put("banner/{id}/", ['as' => "admin.banner.update", 'uses' => 'ImageController@update']);
        Route::delete("banner", ['as' => "admin.banner.destroy", 'uses' => 'ImageController@destroy']);
        Route::put("layout/banner/toggle", ['as' => "admin.banner.toggle", 'uses' => 'ImageController@toggleState']);

        Route::put("layout-order", 'ImageController@updates')->name("admin.layout.updates");



});