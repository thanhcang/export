<?php
Route::group(['prefix' => 'products', 'namespace' => 'Products'], function () {
    // For Read
    // For Write
    Route::post('create', 'Create');
    Route::post('edit/{id}', 'Edit');
    Route::delete('delete/{id}', 'Delete');
});
