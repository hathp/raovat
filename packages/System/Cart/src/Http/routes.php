<?php


Route::group(['prefix' => 'admin/cart', 'middleware' => ['web', 'admin'], 'namespace' => 'System\Cart\Http\Controllers'], function () {
    Route::group(['prefix' => 'order'], function() {
        Route::get('/', ['uses' => 'OrderController@index', 'as' => 'admin.cart.order.index']);
        Route::get('/create', ['uses' => 'OrderController@create', 'as' => 'admin.cart.order.create']);
        Route::get('/{id}', 'OrderController@show')->name('admin.cart.order.show');
        Route::get('/{id}/edit', 'OrderController@edit')->name('admin.cart.order.edit');
        Route::put('/{id}', 'OrderController@update')->name('admin.cart.order.update');
        Route::delete('/', 'OrderController@destroy')->name('admin.cart.order.destroy');
        Route::put('/', 'OrderController@toggleState')->name('admin.cart.order.toggle');
    });
});