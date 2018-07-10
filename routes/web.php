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
  Route::get('/resumes', 'User\UserController@index')->name('home');
  
  // Route::get('/','User\UserController@index');
  Route::get('/','User\DashboardController@dashboard')->name('main');
  Route::get('/emp/{emp}','User\UserController@show')->name('emp.show');
  Route::post('/emp/{emp}/comment','User\UserController@saveComment')->name('emp.comment');
  Route::post('/dnd','User\UserController@dnd')->name('emp.dnd');
  Route::post('/nondnd','User\UserController@nondnd')->name('emp.nondnd');
  Route::get('/dashboard', 'User\DashboardController@dashboard')->name('user.employment.dashboard');
  Route::get('/recentresume', 'User\DashboardController@recentresume')->name('user.employment.recentresume');
  Route::get('/yesterdayresume', 'User\DashboardController@yesterdayresume')->name('user.employment.yesterdayresume');
  Route::get('/twodaybackresume', 'User\DashboardController@twodaybackresume')->name('user.employment.twodaybackresume');
  Route::get('/weekresume', 'User\DashboardController@weekresume')->name('user.employment.weekresume');
  Route::get('/monthresume', 'User\DashboardController@monthresume')->name('user.employment.monthresume');
  Route::get('/yearresume', 'User\DashboardController@yearresume')->name('user.employment.yearresume');
  Route::get('/latestresume', 'User\DashboardController@latestresume')->name('user.employment.latestresume');
  Route::post('/sendMail','EmploymentController@mail')->name('send.mail');

  Route::post('/sendmailtouser','EmploymentController@sendmail');

  Route::get('myform',array('as'=>'myform','uses'=>'EmploymentController@myform'));
  Route::get('myform/ajax/{id}',array('as'=>'myform.ajax','uses'=>'EmploymentController@myformAjax'));
});



Route::match(['get', 'post'],'/admin/login','AdminController@login')->name('admin.login');

// admin section routes
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

// admin route section end

Route::get('/admin/geolocal','EmploymentController@geolocal');

