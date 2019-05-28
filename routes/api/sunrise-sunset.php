<?php

use Illuminate\Http\Request;

Route::get('/', [
    'as' => 'get_sunrise-sunset',
    'uses' => 'SunriseSunsetController@index'
]);
