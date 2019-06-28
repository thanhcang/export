<?php
Route::group(['prefix' => 'managements', 'namespace' => 'Managements'], function () {

    Route::group(['prefix' => 'list-options', 'namespace' => 'ListsOption'], function () {

        Route::group(['namespace' => 'Write\System'], function () {
            Route::post('create/select', 'CreateSelectController');
        });

        Route::group(['namespace' => 'Write\Admin'], function () {
            Route::post('create/select/option/{id}', 'CreateOptionController@handle');
            Route::post('create/select/option/edit/{id}', 'EditOptionController@handle');
            Route::post('create/select/option/enable/{id}', 'EnableOptionController@handle');
            Route::post('create/select/option/disable/{id}', 'DisableOptionController@handle');
        });
    });

    require api_v1_path('Managements/Roles/route.php');
});
