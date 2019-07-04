<?php
Route::group(['prefix' => 'contacts', 'namespace' => 'Contacts'], function () {
    //read
    Route::post('create', 'Create');
});
