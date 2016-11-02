<?php


Route::group(['prefix' => 'admin', 'middleware' => ['web', 'admin'], 'namespace' => 'System\Member\Http\Controllers'], function () {
	//member
	Route::resource('member', 'MemberController');
    Route::get('member/destroy', ['uses' =>'MemberController@destroy','as' => 'admin.member.destroy']);
    Route::put("members/toggle", ['as' => "admin.member.toggle", 'uses' => 'MemberController@toggleState']);
    Route::put("members/featured", ['as' => "admin.member.featured", 'uses' => 'MemberController@toggleState']);
    Route::put("members/updates", ['as' => "admin.member.updates", 'uses' => 'MemberController@updates']);
    Route::post('members/find', ['uses' =>'MemberController@find','as' => 'admin.member.find']);

    //member group
	Route::resource('member-group', 'MemberGroupController');
    Route::get('member-group/destroy', ['uses' =>'MemberGroupController@destroy','as' => 'admin.member.group.destroy']);
    Route::put("member-groups/toggle", ['as' => "admin.member.group.toggle", 'uses' => 'MemberGroupController@toggleState']);
    Route::put("member-groups/featured", ['as' => "admin.member.group.featured", 'uses' => 'MemberGroupController@toggleState']);
    Route::put("member-groups/updates", ['as' => "admin.member.group.updates", 'uses' => 'MemberGroupController@updates']);
  
});