<?php


Route::group(['prefix' => 'admin', 'middleware' => ['web', 'admin'], 'namespace' => 'System\Setting\Http\Controllers'], function(){
    Route::get('setting', ['as' => 'admin.setting.index', 'uses' => 'SettingController@index']);
    Route::put('setting',['as' => 'admin.setting.updates', 'uses' => 'SettingController@updates']);
    Route::post('setting',['as' => 'admin.setting.upload', 'uses' => 'SettingController@upload']);


    Route::delete('language', ['uses' =>'LanguageController@destroy','as' => 'admin.language.destroy']);
    Route::put('language/updates',['as' => 'admin.languages.updates', 'uses' => 'LanguageController@updates']);
    Route::put('language', ['uses' =>'LanguageController@toggleState','as' => 'admin.language.toggle']);
    Route::resource('language', 'LanguageController', ['except' => ['destroy']]);
	
	Route::delete('country', ['uses' =>'CountryController@destroy','as' => 'admin.country.destroy']);
    Route::put('country/updates',['as' => 'admin.countries.updates', 'uses' => 'CountryController@updates']);
    Route::put('country', ['uses' =>'CountryController@toggleState','as' => 'admin.country.toggle']);
    Route::resource('country', 'CountryController', ['except' => ['destroy']]);
	
	Route::delete('currency', ['uses' =>'CurrencyController@destroy','as' => 'admin.currency.destroy']);
    Route::put('currency/updates',['as' => 'admin.currencies.updates', 'uses' => 'CurrencyController@updates']);
    Route::put('currency', ['uses' =>'CurrencyController@toggleState','as' => 'admin.currency.toggle']);
    Route::resource('currency', 'CurrencyController', ['except' => ['destroy']]);
	Route::get('currency/get_default/{id}', ['as' => 'admin.currency.get_default', 'uses' => 'CurrencyController@get_default']);
	Route::get('currency/set_default/{id}', ['as' => 'admin.currency.set_default', 'uses' => 'CurrencyController@set_default']);

});