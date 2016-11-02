<?php


Route::group(['middleware' => 'web'], function() {
    Route::get('user', function(){
        return 'trung';
    });
});