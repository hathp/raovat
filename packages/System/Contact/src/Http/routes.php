<?php


Route::group(['prefix' => 'admin', 'middleware' => ['web', 'admin'], 'namespace' => 'System\Contact\Http\Controllers'], function () {

    Route::resource('contact', 'ContactController');
    Route::delete('contact', ['uses' =>'ContactController@destroy','as' => 'admin.contact.destroy']);

});