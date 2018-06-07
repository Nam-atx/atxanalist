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

Route::post('login', 'API\UserController@login');
Route::post('register', 'API\UserController@register');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => 'auth:api'], function(){
	Route::post('/employmentcomment/{id}', 'EmploymentController@postComment');
});
Route::get('/getemployments', 'EmploymentController@getList');
Route::get('/getemployee/{id}', 'EmploymentController@getEmployeeDetail');

Route::get('/comments/{id}', 'EmploymentController@getComments');


