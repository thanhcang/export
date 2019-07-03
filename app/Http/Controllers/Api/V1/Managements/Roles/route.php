<?php
Route::group(['prefix' => 'roles', 'namespace' => 'Roles'], function () {
    // For Read
    Route::group(['namespace' => 'Read'], function () {
        Route::get('features', 'Features');
    });

    // For Admin
    Route::group(['namespace' => 'Write\Admin'], function () {
    });

    // For System
    Route::group(['namespace' => 'Write\System'], function () {
        Route::post('create/roles', 'CreateRole');
        Route::post('create/permissions/{id}', 'CreatePermissionsForRole');
    });
});
