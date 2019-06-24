<?php
Route::group(['prefix' => 'managements', 'namespace' => 'Managements'], function () {

    Route::group(['prefix' => 'list-options', 'namespace' => 'ListsOption'], function () {
        Route::post('create', 'CreateController@handle');
        Route::post('edit/{id}', 'EditController@handle');
        Route::post('enable/{id}', 'Enable@handle');
        Route::post('disable/{id}', 'Disable@handle');
        Route::group(['prefix' => 'option-title'], function () {
            Route::post('create/{id}', 'CrateOptionTitleTrans@handle');
            Route::post('edit', 'EditOptionTitleTrans@handle');
        });
        Route::get('/', 'OptionsController@handle');
    });

    Route::group(['prefix' => 'leads', 'namespace' => 'Leads'], function () {
        Route::get('/', 'ListController@handle');
    });
});
