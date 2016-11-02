<?php


Route::group(['prefix' => 'admin', 'middleware' => ['web', 'admin'], 'namespace' => 'System\Page\Http\Controllers'], function () {
    // Get all root page categories
    $root_page_categories = \System\Page\Model\PageCategory::whereNull('parent_id')->get()->pluck('slug')->toArray();
    // Define all route for all categories
    foreach($root_page_categories as $root_page_category) {
        // Listing all category
        Route::get("$root_page_category-category", [
            'as' => "admin.$root_page_category.category.index", 'uses' => 'PageCategoryController@index'
        ]);

        Route::get("$root_page_category-category/{id}", [
            'as' => "admin.$root_page_category.category.show", 'uses' => 'PageCategoryController@show'
        ]);

        // Listing all pages with this a category
        Route::get("$root_page_category-category/{id}/page", [
            'as' => "admin.$root_page_category.category.page", 'uses' => 'PageCategoryController@pages'
        ]);


        Route::post("$root_page_category-category", 'PageCategoryController@store')->name("admin.$root_page_category.category.store");
        Route::get("$root_page_category-category/{id}/edit", 'PageCategoryController@edit')->name("admin.$root_page_category.category.edit");
        Route::put("$root_page_category-category/{id}", 'PageCategoryController@update')->name("admin.$root_page_category.category.update");
        Route::put("$root_page_category-category", 'PageCategoryController@updates')->name("admin.$root_page_category.category.updates");
        Route::post("$root_page_category-find", 'PageCategoryController@find')->name("admin.$root_page_category.category.find");

        Route::put('service/category/toggle', 'PageCategoryController@toggleState')->name('admin.category.toggle');
        Route::delete("$root_page_category-category", 'PageCategoryController@destroy')->name("admin.$root_page_category.category.destroy");
    }

    foreach($root_page_categories as $root_page_category) {
        Route::get("$root_page_category", ['as' => "admin.$root_page_category.index", 'uses' => 'PageController@index']);
        Route::get("$root_page_category/{id}", ['as' => "admin.$root_page_category.show", 'uses' => 'PageController@show']);
        Route::get("$root_page_category/create", ['as' => "admin.$root_page_category.create", 'uses' => 'PageController@create']);
        Route::post("$root_page_category", ['as' => "admin.$root_page_category.store", 'uses' => 'PageController@store']);
        Route::get("$root_page_category/{id}/edit", ['as' => "admin.$root_page_category.edit", 'uses' => 'PageController@edit']);
        Route::put("$root_page_category/", ['as' => "admin.$root_page_category.updates", 'uses' => 'PageController@updates']);
        Route::put("$root_page_category/{id}/", ['as' => "admin.$root_page_category.update", 'uses' => 'PageController@update']);
        Route::delete("$root_page_category", ['as' => "admin.$root_page_category.destroy", 'uses' => 'PageController@destroy']);
        Route::post("$root_page_category/find", ['as' => "admin.$root_page_category.find", 'uses' => 'PageController@find']);
        Route::put("service/$root_page_category/toggle", ['as' => "admin.$root_page_category.toggle", 'uses' => 'PageController@toggleState']);
        Route::put("service/$root_page_category/featured", ['as' => "admin.$root_page_category.featured", 'uses' => 'PageController@toggleState']);
        //Route::post("service/$root_page_category/find", ['as' => "admin.$root_page_category.category", 'uses' => 'PageController@find']);
    }
});