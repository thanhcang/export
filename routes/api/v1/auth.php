<?php
Route::group(['prefix' => 'auth', 'namespace' => 'Auth'], function () {
    Route::post('login', 'LoginController@handle');
    Route::post('register', 'RegisterController@handle');
    Route::post('password/forget', 'ForgotPasswordController@handle');
    Route::post('email/verify', 'EmailVerifyController@handle');
    Route::post('password/reset', 'ResetPasswordController@handle');
});
