<?php
/**
 * Created by trungtran
 * Email: tranviettrung92@gmail.com
 * Date: 26/2/2016
 * Time: 2:04 PM
 */

Route::group(['middleware' => ['web'], 'namespace' => 'Front\Http\Controllers'], function () {
    Route::get('/', 'HomeController@index');
    Route::get('dang-tin-rao-vat', 'ClassifiedController@create')->name('front.classified.create');
    Route::post('dang-tin-rao-vat', 'ClassifiedController@store')->name('front.classified.store');

    Route::get('nhom/{category}', 'ClassifiedController@category')->name('front.classified.category');
    Route::get('rao-vat/{classified}', 'ClassifiedController@show')->name('front.classified.show');
    Route::post('upload-image/muntiupload', 'ClassifiedController@upload')->name('front.classified.upload');
    Route::post('delete-image/upload', 'ClassifiedController@deleteFile')->name('front.classified.deleteFile');
    Route::post('danh-gia/raty', 'ClassifiedController@raty')->name('front.user.classified.raty');
    Route::get('quoc-gia/cookies/{id}', 'ClassifiedController@cookies')->name('front.user.classified.cookies');

    // Cart
    Route::get('gio-hang', 'CartController@index')->name('front.cart.index');
    Route::post('gio-hang','CartController@update')->name('front.cart.update');
    Route::get('thanh-toan', 'CartController@getPayment')->name('front.cart.payment');
    Route::post('thanh-toan', 'CartController@postPayment');
    Route::get('thanh-cong', 'CartController@success')->name('front.cart.success');
    Route::get('add-to-cart/{id}', 'CartController@add')->name('front.cart.add');
    Route::get('remove-from-cart/{id}', 'CartController@remove')->name('front.cart.remove');

    Route::group(['prefix' => 'nguoi-dung', 'middleware' => ['auth']], function() {
        Route::get('/rao-vat', 'UserController@publishedClassifieds')->name('front.user.classified');

        Route::get('/rao-vat/{classified_slug}/sua', 'ClassifiedController@edit')->name('front.user.classified.edit');
        Route::put('/rao-vat/{classified}', 'ClassifiedController@update')->name('front.user.classified.update');
        Route::delete('/delete/{classified}', 'ClassifiedController@destroy')->name('front.user.classified.destroy');
		//comment
		Route::post('comment',['as' => "front.comment.comment", 'uses' => 'CommentController@comment']);
        Route::get('/', 'UserController@edit')->name('front.user.edit');
        Route::put('/', 'UserController@update')->name('front.user.update');
        Route::get('doi-mat-khau', 'UserController@changePassword')->name('front.user.password.change');
        Route::put('doi-mat-khau', 'UserController@updatePassword')->name('front.user.password.update');
    });

    Route::group(['namespace' => 'Auth'], function() {
        Route::get('a/{user}/{confirm}', 'AuthController@confirmUser')->name('front.auth.confirm');
        Route::get('dang-ky', 'AuthController@getRegister')->name('front.auth.register');
        Route::post('dang-ky', 'AuthController@postRegister')->name('front.auth.register');
        Route::get('dang-nhap', 'AuthController@getLogin')->name('front.auth.login');
        Route::post('dang-nhap', 'AuthController@postLogin');
        Route::get('dang-xuat', 'AuthController@logout')->name('front.auth.logout');
        Route::post('service/check-login', 'AuthController@checkLogin')->name('front.service.user.check');
    });

});