<?php
Route::group(['prefix' => 'auth', 'namespace' => 'Auth'], function () {
    Route::post('login', 'Login');
    Route::post('register', 'Register');
    Route::post('password/forget', 'ForgotPassword');
    Route::post('email/verify', 'EmailVerify');
    Route::post('password/reset', 'ResetPassword');
});
