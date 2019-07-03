<?php
Route::group(['prefix' => 'lists-options', 'namespace' => 'ListsOptions'], function () {
    //read
    Route::get('selects/options', 'OptionsForSelect');
    //write for  select
    Route::post('selects/create', 'CreateSelect');
    Route::post('selects/options/create/{id}', 'CreateOption');
    // write for option
    Route::post('selects/options/edit/{id}', 'EditOption');
    Route::post('selects/options/enable/{id}', 'EnableOption');
    Route::post('selects/options/disable/{id}', 'DisableOption');
});
