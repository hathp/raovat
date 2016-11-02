<?php

Route::group(['prefix' => 'admin', 'middleware' => ['web', 'admin'], 'namespace' => 'System\Classified\Http\Controllers'], function () {
    Route::put('service/classified/toggle', ['as' => 'admin.classified.toggle', 'uses' => 'ClassifiedController@toggle']);

    Route::group(['prefix' => 'category'], function() {
        Route::put('classified/toggle', ['as' => 'admin.category.classified.toggle', 'uses' => 'ClassifiedCategoryController@toggle']);
        Route::resource('classified', 'ClassifiedCategoryController', ['except' => 'destroy']);
        Route::delete('classified', ['as' => 'admin.category.classified.destroy', 'uses' => 'ClassifiedCategoryController@destroy']);

    });


    Route::resource('classified', 'ClassifiedController', ['except' => 'destroy']);
    Route::delete('classified', ['as' => 'admin.classified.destroy', 'uses' => 'ClassifiedController@destroy']);

});