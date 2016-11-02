<?php


Route::group(['prefix' => 'admin', 'middleware' => ['web', 'admin'], 'namespace' => 'System\Comment\Http\Controllers'], function () {

        Route::get("comnent/products", ['as' => "admin.comment.product.index", 'uses' => 'CommentController@index']);
        Route::delete("comnent/products/destroy", ['as' => "admin.comment.products.destroy", 'uses' => 'CommentController@destroy']);
        Route::put("comnents/products/toggle", ['as' => "admin.comment.products.toggle", 'uses' => 'CommentController@toggleState']);

        Route::put("comnents/updates", ['as' => "admin.comment.updates", 'uses' => 'CommentController@updates']);

        Route::get("comnent/pages", ['as' => "admin.comment.page.index", 'uses' => 'CommentController@index']);
        Route::delete("comnent/pages/destroy", ['as' => "admin.comment.pages.destroy", 'uses' => 'CommentController@destroy']);
        Route::put("comnents/pages/toggle", ['as' => "admin.comment.pages.toggle", 'uses' => 'CommentController@toggleState']);

});