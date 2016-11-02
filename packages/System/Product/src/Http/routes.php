<?php


Route::group(['prefix' => 'admin', 'middleware' => ['web', 'admin'], 'namespace' => 'System\Product\Http\Controllers'], function () {

    Route::get('product/category',['uses' =>'ProductCategoryController@index','as' => 'admin.product.category.index']);
    Route::get('product/category/{id?}', ['uses' =>'ProductController@index','as' => 'admin.product.category']);
    Route::post('product/category', ['uses' =>'ProductCategoryController@store','as' => 'admin.product.category.store']);
    Route::get('product/category/{id}/edit', ['uses' =>'ProductCategoryController@edit','as' => 'admin.product.category.edit']);
    Route::put('product/category/{$id}', ['uses' =>'ProductCategoryController@update','as' => 'admin.product.category.update']);
    Route::put('product/category/toggle', ['uses' =>'ProductCategoryController@toggleState','as' => 'admin.product.category.toggle']);
    Route::delete('product/category', ['uses' =>'ProductCategoryController@destroy','as' => 'admin.product.category.destroy']);
    Route::get('product/category/{$id}', ['uses' =>'ProductCategoryController@show','as' => 'admin.product.category.show']);

    Route::resource('product', 'ProductController');
    Route::get('product/destroy', ['uses' =>'ProductController@destroy','as' => 'admin.product.destroy']);
    Route::put("products/toggle", ['as' => "admin.product.toggle", 'uses' => 'ProductController@toggleState']);
    Route::put("products/featured", ['as' => "admin.product.featured", 'uses' => 'ProductController@toggleState']);
    Route::put("products/updates", ['as' => "admin.product.updates", 'uses' => 'ProductController@updates']);
    Route::post('product/find', ['uses' =>'ProductController@find','as' => 'admin.product.find']);

    Route::resource('product-category', 'ProductCategoryController');
    Route::get("product-category/{id}/product", ['as' => "admin.product.category.product", 'uses' => 'ProductCategoryController@products']);
    Route::put("product-category", 'ProductCategoryController@updates')->name("admin.product.category.updates");
    Route::post('product/category/find', ['uses' =>'ProductCategoryController@find','as' => 'admin.product.category.find']);
    //product-option
    Route::resource('product-option', 'ProductOptionController');
    Route::delete('product-option', ['uses' =>'ProductOptionController@destroy','as' => 'admin.product.option.destroy']);
    Route::post('product-option/option', ['uses' =>'ProductOptionController@option', 'as' => 'admin.product.option.option']);
    Route::post('product-option/get_option', ['uses' =>'ProductOptionController@get_option', 'as' => 'admin.product.option.get_option']);
    Route::put('product-options/toggle', ['uses' =>'ProductOptionController@toggleState','as' => 'admin.product.option.toggle']);
    Route::put("product-options/updates", ['as' => "admin.product.option.updates", 'uses' => 'ProductOptionController@updates']);
	//attribute
	Route::resource('product-attribute', 'AttributeController');
    Route::delete('product-attribute', ['uses' =>'AttributeController@destroy','as' => 'admin.attribute.destroy']);
//    Route::post('product-attribute/option', ['uses' =>'AttributeController@option', 'as' => 'admin.attribute.option']);
//    Route::post('product-attribute/get_option', ['uses' =>'AttributeController@get_option', 'as' => 'admin.attribute.get_option']);
    Route::put('product-attributes/toggles', ['uses' =>'AttributeController@toggleState','as' => 'admin.attribute.toggle']);
    Route::put("product-attributes/updates", ['as' => "admin.attribute.updates", 'uses' => 'AttributeController@updates']);
    Route::post("product-attribute-value/get_value", ['as' => "admin.product.attribute.get_value", 'uses' => 'AttributeController@get_value']);
	//manufacture
	Route::resource('product-manufacture', 'ManufactureController');
    Route::delete('product-manufactures', ['uses' =>'ManufactureController@destroy','as' => 'admin.manufacture.destroy']);
    Route::put('product-manufactures/toggles', ['uses' =>'ManufactureController@toggleState','as' => 'admin.manufacture.toggle']);
    Route::put("product-manufactures/updates", ['as' => "admin.manufacture.updates", 'uses' => 'ManufactureController@updates']);
    Route::post("product-manufactures/get_manufac", ['as' => "admin.manufacture.get_manufac", 'uses' => 'ManufactureController@get_manufac']);


});