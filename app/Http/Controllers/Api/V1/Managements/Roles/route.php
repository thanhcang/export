<?php
Route::group(['prefix' => 'roles', 'namespace' => 'Roles'], function () {
    // For Read
    Route::group(['namespace' => 'Read'], function () {
    });

    // For Admin
    Route::group(['namespace' => 'Write\Admin'], function () {
    });

    // For System
    Route::group(['namespace' => 'Write\System'], function () {
        Route::post('create/roles', 'CreateRole');
    });
});
