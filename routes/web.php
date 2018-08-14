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
Route::get('/home', 'HomeController@index')->name('home');




Route::match(['get', 'post'],'/admin/login','AdminController@login')->name('admin.login');

// admin section routes
Route::group(['middleware'=>['auth','admin']],function(){
  Route::get('/admin/dashboard','Admin\AdminController@dashboard')->name('admin.dashboard');
  Route::get('/admin/users','Admin\AdminController@users')->name('admin.users');
  Route::get('/admin/user/add','Admin\AdminController@userCreate')->name('admin.user.create');
  Route::post('/admin/user/store','Admin\AdminController@userStore')->name('admin.user.store');
  Route::get('/admin/user/{id}/edit','Admin\AdminController@userEdit')->name('admin.user.edit');
  Route::put('/admin/user/{id}/update','Admin\AdminController@userUpdate')->name('admin.user.update');
  Route::get('/admin/user/{id}/disable','Admin\AdminController@userDisable')->name('admin.user.disable');
  Route::get('/admin/user/{id}/enable','Admin\AdminController@userEnable')->name('admin.user.enable');

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

  // client excel data functionality

  Route::get('/admin/client/index','Admin\ClientController@clientImportExport')->name('admin.client.index');
  Route::post('/admin/client/import','Admin\ClientController@clientImportExcel')->name('admin.client.import');

  Route::get('/admin/client/export/{type}','Admin\ClientController@clientExportExcel')->name('admin.client.export');

  // client management
  Route::get('/admin/client/list','Admin\ClientController@list')->name('admin.client.list');
  Route::get('/admin/client/{client}/edit','Admin\ClientController@edit')->name('admin.client.edit');
  Route::put('/admin/client/{client}/edit','Admin\ClientController@update')->name('admin.client.update');
  Route::get('/admin/client/add','Admin\ClientController@add')->name('admin.client.add');
  Route::post('/admin/client/save','Admin\ClientController@save')->name('admin.client.save');

});

// admin route section end


// recruiter
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
  
  Route::post('/candidateMail','EmploymentController@sendEmailToCandidate')->name('candidate.mail');
  Route::post('/sendmailtouser','EmploymentController@sendmail');

  Route::post('gettemplate','EmploymentController@getTemplate')->name('template.get');
  Route::post('sales/sendemail','EmploymentController@sendSalesEmail')->name('sendsales.email');

  //resume routes for recruiter

  Route::get('/resume/add', 'Recruiter\EmploymentController@create')->name('recruiter.employment.create');
  Route::post('/resume/save', 'Recruiter\EmploymentController@store')->name('recruiter.employment.store');

  //resume routes for recruiter

});

// recruiter

// Sales section routes start
Route::group(['middleware'=>['auth','sales']],function(){

  Route::get('/sales/dashboard','Sales\DashboardController@index')->name('sales.dashboard.index');
  Route::get('/sales/clients', 'Sales\ClientController@index')->name('sales.client.index');
  Route::post('/sales/sendMail','Sales\ClientController@sendEmailToSales')->name('salestoclient.mail');
  Route::get('/sales/client/add', 'Sales\ClientController@create')->name('sales.client.create');
  Route::post('/sales/client/save', 'Sales\ClientController@store')->name('sales.client.store');

  Route::get('/sales/client/{client}','Sales\ClientController@show')->name('sales.client.show');
  Route::post('/sales/client/{client}/comment','Sales\ClientController@saveComment')->name('client.comment');

  Route::get('/sales/recentclient', 'Sales\DashboardController@recentclient')->name('sales.dashboard.recentclient');
  Route::get('/sales/yesterdayclient', 'Sales\DashboardController@yesterdayclient')->name('sales.dashboard.yesterdayclient');
  Route::get('/sales/twodaybackclient', 'Sales\DashboardController@twodaybackclient')->name('sales.dashboard.twodaybackclient');
  Route::get('/sales/weekclient', 'Sales\DashboardController@weekclient')->name('sales.dashboard.weekclient');
  Route::get('/sales/monthclient', 'Sales\DashboardController@monthclient')->name('sales.dashboard.monthclient');
  Route::get('/sales/yearclient', 'Sales\DashboardController@yearclient')->name('sales.dashboard.yearclient');
  Route::get('/sales/latestclient', 'Sales\DashboardController@latestclient')->name('sales.dashboard.latestclient');
  
  
  Route::post('/sendmailtoclient','Sales\ClientController@sendmail');

  Route::post('sales/gettemplate','Sales\ClientController@getTemplate')->name('salestemplate.get');

});
// Sales section routes end

Route::get('/admin/geolocal','EmploymentController@geolocal');

Route::get('/test',function(){
  echo bcrypt('123456');
});
