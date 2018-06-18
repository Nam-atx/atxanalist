<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::match(['get', 'post'],'/','AdminController@login')->name('admin.login');

Auth::routes();
Route::group(['middleware'=>['auth','user']],function(){
  Route::get('/home', 'User\UserController@index')->name('home');
  Route::get('/','User\UserController@index');
  Route::get('/emp/{emp}','User\UserController@show')->name('emp.show');
  Route::post('/emp/{emp}/comment','User\UserController@saveComment')->name('emp.comment');
});



Route::match(['get', 'post'],'/admin/login','AdminController@login')->name('admin.login');
Route::group(['middleware'=>['auth','admin']],function(){
  Route::get('/admin/dashboard','AdminController@dashboard')->name('admin.dashboard');
  Route::get('/admin/users','AdminController@users')->name('admin.users');
  Route::get('/admin/user/add','AdminController@userCreate')->name('admin.user.create');
  Route::post('/admin/user/store','AdminController@userStore')->name('admin.user.store');
  Route::get('/admin/user/{id}/edit','AdminController@userEdit')->name('admin.user.edit');
  Route::put('/admin/user/{id}/update','AdminController@userUpdate')->name('admin.user.update');
  Route::get('/admin/user/{id}/disable','AdminController@userDisable')->name('admin.user.disable');
  Route::get('/admin/user/{id}/enable','AdminController@userEnable')->name('admin.user.enable');

  // excel data functionality

  Route::get('/admin/excel/index','EmploymentController@importExport')->name('admin.excel.index');
  Route::post('/admin/excel/import','EmploymentController@importExcel')->name('admin.excel.import');

  Route::get('/admin/excel/export/{type}','EmploymentController@exportExcel')->name('admin.excel.export');
  
  // employment management

  Route::get('/admin/emp/list','EmploymentController@list')->name('admin.emp.list');
  Route::get('/admin/emp/{emp}/edit','EmploymentController@edit')->name('admin.emp.edit');
  Route::put('/admin/emp/{emp}/edit','EmploymentController@update')->name('admin.emp.update');
  Route::get('/admin/emp/add','EmploymentController@add')->name('admin.emp.add');
  Route::post('/admin/emp/save','EmploymentController@save')->name('admin.emp.save');

  //logs management

  Route::get('/admin/log/list','LogController@list')->name('admin.log.list');

});

