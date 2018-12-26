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
Route::get('/test', 'HomeController@test')->name('test');
Route::get('/test1', 'HomeController@test1')->name('test1');


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

  Route::get('/admin/excel/index','Admin\EmploymentController@importExport')->name('admin.excel.index');
  Route::post('/admin/excel/import','Admin\EmploymentController@importExcel')->name('admin.excel.import');

  Route::get('/admin/excel/export/{type}','Admin\EmploymentController@exportExcel')->name('admin.excel.export');
  
  // employment management

  Route::get('/admin/emp/list','Admin\EmploymentController@list')->name('admin.emp.list');
  Route::get('/admin/emp/{emp}/edit','Admin\EmploymentController@edit')->name('admin.emp.edit');
  Route::put('/admin/emp/{emp}/edit','Admin\EmploymentController@update')->name('admin.emp.update');
  Route::get('/admin/emp/add','Admin\EmploymentController@add')->name('admin.emp.add');
  Route::post('/admin/emp/save','Admin\EmploymentController@save')->name('admin.emp.save');

  //logs management
  Route::get('/admin/log/list','Admin\LogController@list')->name('admin.log.list');

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

  Route::get('/admin/dashboard/totaldnd','Admin\AdminController@totaldnd')->name('admin.dashboard.totaldnd');
  Route::get('/admin/dashboard/totalemployees','Admin\AdminController@totalemployees')->name('admin.dashboard.totalemployees');
  Route::get('/admin/dashboard/totalsales','Admin\AdminController@totalsales')->name('admin.dashboard.totalsales');
  Route::get('/admin/dashboard/totalrecruiter','Admin\AdminController@totalrecruiter')->name('admin.dashboard.totalrecruiter');

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

  Route::get('/loginhistory', 'User\UserController@loginhistory')->name('user.employment.loginhistory');

  
  Route::post('/candidateMail','EmploymentController@sendEmailToCandidate')->name('candidate.mail');
  Route::post('/sendmailtouser','EmploymentController@sendmail');

  Route::post('gettemplate','EmploymentController@getTemplate')->name('template.get');
  Route::post('sales/sendemail','EmploymentController@sendSalesEmail')->name('sendsales.email');

  //resume routes for recruiter

  Route::get('/resume/add', 'Recruiter\EmploymentController@create')->name('recruiter.employment.create');
  Route::post('/resume/save', 'Recruiter\EmploymentController@store')->name('recruiter.employment.store');


  Route::post('/atxemployee','User\UserController@atxemployee')->name('emp.atxemployee');
  Route::post('/nonatxemployee','User\UserController@nonatxemployee')->name('emp.nonatxemployee');

  Route::get('/todayfollowup','User\UserController@todayfollowup')->name('emp.todayfollowup');
  Route::get('/futurefollowup','User\UserController@futurefollowup')->name('emp.futurefollowup');


  Route::post('/employeeupdate/{emp}','User\UserController@employeeupdate')->name('emp.employeeupdate');
  Route::post('/updaterequired/{emp}','User\UserController@updaterequired')->name('emp.updaterequired');

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

  Route::post('/sales/dnd','Sales\ClientController@dnd')->name('sales.client.dnd');
  Route::post('/sales/nondnd','Sales\ClientController@nondnd')->name('sales.client.nondnd');

  Route::post('/sales/atxclient','Sales\ClientController@atxclient')->name('sales.client.atxclient');
  Route::post('/sales/nonatxclient','Sales\ClientController@nonatxclient')->name('sales.client.nonatxclient');
  Route::post('/sales/updaterequired/{client}','Sales\ClientController@updaterequired')->name('sales.client.updaterequired');
  Route::post('/sales/clientupdate/{client}','Sales\ClientController@clientupdate')->name('sales.client.clientupdate');

  Route::get('/sales/todayfollowup','Sales\ClientController@todayfollowup')->name('sales.client.todayfollowup');
  Route::get('/sales/futurefollowup','Sales\ClientController@futurefollowup')->name('sales.client.futurefollowup');

  Route::get('/sales/atxclients', 'Sales\ClientController@atxclients')->name('sales.client.atxclients');
  Route::get('/sales/myatxclients', 'Sales\ClientController@myatxclients')->name('sales.client.myatxclients');

});
// Sales section routes end

Route::get('/admin/geolocal','EmploymentController@geolocal');

// Route::get('/test',function(){
//   echo bcrypt('123456');
// });



Route::group(['middleware'=>['auth','editor']],function(){
    Route::get('/editor/dashboard','Editor\DashboardController@index')->name('editor.dashboard.index');
    Route::get('/editor/emp/list','Editor\EmploymentController@list')->name('editor.emp.list');
    Route::get('/editor/emp/{emp}/show','Editor\EmploymentController@show')->name('editor.emp.show');
    Route::get('/editor/emp/{emp}/edit','Editor\EmploymentController@edit')->name('editor.emp.edit');
    Route::put('/editor/emp/{emp}/edit','Editor\EmploymentController@update')->name('editor.emp.update');
    Route::get('/editor/emp/add','Editor\EmploymentController@add')->name('editor.emp.add');
    Route::post('/editor/emp/save','Editor\EmploymentController@save')->name('editor.emp.save');

    // clients url
    Route::get('/editor/client/list','Editor\ClientController@list')->name('editor.client.list');
    Route::get('/editor/client/{client}/show','Editor\ClientController@show')->name('editor.client.show');
    Route::get('/editor/client/{client}/edit','Editor\ClientController@edit')->name('editor.client.edit');
    Route::put('/editor/client/{client}/edit','Editor\ClientController@update')->name('editor.client.update');
    Route::get('/editor/client/add','Editor\ClientController@add')->name('editor.client.add');
    Route::post('/editor/client/save','Editor\ClientController@save')->name('editor.client.save');

});


Route::group(['middleware'=>['auth','rm']],function(){

  //Route::get('/rm/latestresume','Rm\EmploymentController@latestresume')->name('rm.emp.latestresume');

  Route::get('/rm/','Rm\EmploymentController@dashboard')->name('rm.main');
  Route::get('/rm/emp/{emp}','Rm\EmploymentController@show')->name('rm.emp.show');
  Route::post('/rm/emp/{emp}/comment','Rm\EmploymentController@saveComment')->name('rm.emp.comment');
  Route::post('/rm/dnd','Rm\EmploymentController@dnd')->name('rm.emp.dnd');
  Route::post('/rm/nondnd','Rm\EmploymentController@nondnd')->name('rm.emp.nondnd');
  Route::get('/rm/dashboard', 'Rm\EmploymentController@dashboard')->name('rm.employment.dashboard');
  Route::get('/rm/recentresume', 'Rm\EmploymentController@recentresume')->name('rm.employment.recentresume');
  Route::get('/rm/yesterdayresume', 'Rm\EmploymentController@yesterdayresume')->name('rm.employment.yesterdayresume');
  Route::get('/rm/twodaybackresume', 'Rm\EmploymentController@twodaybackresume')->name('rm.employment.twodaybackresume');
  Route::get('/rm/weekresume', 'Rm\EmploymentController@weekresume')->name('rm.employment.weekresume');
  Route::get('/rm/monthresume', 'Rm\EmploymentController@monthresume')->name('rm.employment.monthresume');
  Route::get('/rm/yearresume', 'Rm\EmploymentController@yearresume')->name('rm.employment.yearresume');
  Route::get('/rm/latestresume', 'Rm\EmploymentController@latestresume')->name('rm.employment.latestresume');

  Route::get('/rm/loginhistory', 'Rm\EmploymentController@loginhistory')->name('rm.employment.loginhistory');  
  Route::post('/rm/candidateMail','Rm\EmploymentController@sendEmailToCandidate')->name('rm.candidate.mail');
  Route::post('/rm/sendmailtouser','Rm\EmploymentController@sendmail')->name('rm.sendmail');
  Route::post('/rm/gettemplate','Rm\EmploymentController@getTemplate')->name('rm.template.get');
  Route::post('/rm/sales/sendemail','Rm\EmploymentController@sendSalesEmail')->name('rm.sendsales.email');
  //resume routes for recruiter
  Route::get('/rm/resume/add', 'Rm\EmploymentController@create')->name('rm.employment.create');
  Route::post('/rm/resume/save', 'Rm\EmploymentController@store')->name('rm.employment.store');
  Route::post('/rm/atxemployee','Rm\EmploymentController@atxemployee')->name('rm.atxemployee');
  Route::post('/rm/nonatxemployee','Rm\EmploymentController@nonatxemployee')->name('rm.nonatxemployee');
  Route::get('/rm/todayfollowup','Rm\EmploymentController@todayfollowup')->name('rm.todayfollowup');
  Route::get('/rm/futurefollowup','Rm\EmploymentController@futurefollowup')->name('rm.futurefollowup');
  Route::post('/rm/employeeupdate/{emp}','Rm\EmploymentController@employeeupdate')->name('rm.employeeupdate');
  Route::post('/rm/updaterequired/{emp}','Rm\EmploymentController@updaterequired')->name('rm.updaterequired');

});
