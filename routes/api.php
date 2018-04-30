<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('register', 'AuthController@register');
Route::post('login', 'AuthController@login');
Route::get('uploadimage/{token}', 'ProfileController@uploadImage');
Route::get('register/verify/{verification_code}', 'AuthController@verifyUser');

Route::group(['middleware' => ['jwt.auth']], function() {
    Route::get('dashboard/{token}','ProfileController@getUserDetails');
    Route::get('logout/{token}', 'AuthController@logout');
    Route::get('deleteProfile/{token}', 'ProfileController@destroyProfile');
    Route::post('uploadimage/{token}', 'ProfileController@uploadImage');
    Route::get('deleteimage/{token}', 'ProfileController@deleteImage');
});

