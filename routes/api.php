<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:api']], function () {

    Route::put('unsubscribe/{user_id}', 'UnsubscribeController@update');

    // Permissions
    Route::apiResource('permissions', 'PermissionsApiController');

    // Roles
    Route::apiResource('roles', 'RolesApiController');

    // Users
    Route::apiResource('users', 'UsersApiController');

    // Jobs
    Route::apiResource('jobs', 'JobApiController');

    // Posted Jobs
    Route::apiResource('posted-jobs', 'PostedJobApiController', ['except' => ['update', 'destroy']]);

    // Twitter Users
    Route::get('twitter-users/preference/{preference}', 'TwitterUserApiController@preferences');
    Route::apiResource('twitter-users', 'TwitterUserApiController', ['except' => ['destroy']]);

    // Twitter User Jobs
    Route::get('twitter-user-jobs/new/{user_id}', 'TwitterUserJobApiController@new');
    Route::apiResource('twitter-user-jobs', 'TwitterUserJobApiController', ['only' => ['store', 'index', 'show']]);
});
