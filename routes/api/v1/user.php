<?php
Route::group(['prefix' => 'user', 'namespace' => 'User'], function () {
    Route::get('profile', 'ProfileController@profile');
});
