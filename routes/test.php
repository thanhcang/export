<?php

Route::group(['as' => 'Test.'], function () {
    Route::get('lang', ['as' => 'Lang', 'uses' => 'LangController@lang']);
});

