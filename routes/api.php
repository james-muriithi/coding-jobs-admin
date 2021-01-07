<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:api']], function () {
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
    Route::apiResource('twitter-users', 'TwitterUserApiController', ['except' => ['destroy']]);

    // Twitter User Jobs
    Route::apiResource('twitter-user-jobs', 'TwitterUserJobApiController', ['only' => ['store', 'index', 'show']]);
});
