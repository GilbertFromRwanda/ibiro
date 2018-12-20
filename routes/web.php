
<?php
use Illuminate\Http\Request;
//route homepage
Route::get('/',function(){

return view('ibanze');
});
//test sms temp
//Route::get('/sendNotification','AppointementController@getAppointement')->name('sendSms');
//routes ralated to want customer need//
Route::any('/getMoreResult','SearchController@getMoreResult')->name('moreresult');
Route::get('/allSectors','SearchController@getAllSectors')->name('sectors');
Route::any('/Gushakisha','SearchController@secondinput')->name('secondinput');
Route::any('/allDistricts','SearchController@getAlldistrict')->name("districts");
Route::post('/highlight','SearchController@getHighlight')->name('highlight');
Route::get('/Gushakisha/{txt}','SearchController@SecondSearch')->name('SecondSearch');
//related to chhosen office
Route::get('/officeboard/sector/{code}','numbersController@displayNumbering');
Route::get('/officeboard/district/{code}','numbersController@displayNumbering');
Route::post('/getUpdateTonumber','numbersController@getNumberingUpdate');
Route::get('/officeboard/{code}/Gahunda','viewController@getSchedule');
Route::get('/officeboard/{code}/Abayobozi','viewController@getUnavailableEmployee');
Route::get('/officeboard/{code}/Amanama','viewController@getMeetings');
Route::get('/officeboard/{code}/Amatangazo','viewController@getannouncement')->name('shortamata');
Route::get('/officeboard/{code}/Appointement','AppointementController@getEmployeList')->name('empList');
Route::post('/officeboard/umuyobozi/setAppointment','AppointementController@setAppointment');
Route::get('/officeboard/umuyobozi/Appointement/{empId}','AppointementController@choosenLeader')->name('choosen_emp');
Route::get('/board/itangazo/details/{id}','boarddistrictController@readitangazo')->where('id', '[0-9]+');
Route::get('/board/inama/details/{id}','boarddistrictController@readinama')->where('id', '[0-9]+');
Route::post('/officeboard/storecommentonservice','boarddistrictController@storeservicecomment');
Route::get('/officeboard/{csetode}/suggestionbox','boarddistrictController@viewservicepage');
Route::post('/getUpdateToemployee','ibiroController@getEmployeeUpdatee');
// related to office
Auth::routes();
Route::group(['prefix' => 'office'], function () {
Route::get('/login', 'OfficeAuth\LoginController@showLoginForm')->name('loginO');
Route::post('/login', 'OfficeAuth\LoginController@login');
Route::post('/logout', 'OfficeAuth\LoginController@logout')->name('logoutO');
Route::get('/register', 'OfficeAuth\RegisterController@showRegistrationForm')->name('register');
Route::post('/register', 'OfficeAuth\RegisterController@register');
Route::get('/verify','verifyController@verify')->name('verify');
Route::get('/dashboard','verifyController@getstarted');
Route::post('/changeprofile','verifyController@changeofficeprofile');
Route::resource('/office-announce','itangazoController');
Route::post('/office-announce/update','itangazoController@updateannounce');
Route::get('/viewamatangazo','itangazoController@viewannounce');

Route::get('/deleteannounce/{id}','itangazoController@destroy')->where('id', '[0-9]+');

Route::resource('/office-newemp','empController');

Route::get('/EmployeeRegistration','empController@makeRegistration')->name('newEmp');
Route::post('/removeleader','empController@destroyleader');
Route::get('/empAbsence','exceptionController@index');
Route::post('/empstutas','exceptionController@changestutas');
Route::post('/empthere','exceptionController@changethere');
Route::get('/viewunavailable','exceptionController@viewexception')->name('unvailable');
Route::post('/getleaderinfo','empController@getleaderinfo');
Route::any('/editLeaderInfo','empController@EditLeaderInfo');
Route::get('/setUnvailable/{id}','exceptionController@showExceptionform')->where('id', '[0-9]+');

Route::get('/comments','exceptionController@viewcomments');
Route::get('/read/{id}','exceptionController@readcomments')->where('id', '[0-9]+');
Route::get('/sectorcomments/{id}','exceptionController@readSectorComments');
Route::post('/inbox','exceptionController@unreadMessage');
Route::get('/read/details/{id}','exceptionController@readsectorcommentsbyD')->where('id', '[0-9]+');
Route::post('/read/wantedcomments',"exceptionController@commentswithdates");
Route::post('/read/intervalComments','exceptionController@readcommentsfromDistrict');
Route::get('/notification/{emp}/{to}/{from}','AppointementController@sendSms');
Route::resource('/office-inama','meetingController');
Route::get('/viewinama','meetingController@viewinama');
Route::post('/pub_inama','meetingController@store');

Route::resource('/office-agenda','gahundaController');
Route::get('/office-agenda/{gahunda}','gahundaController@show');
Route::get('/viewofficeagenda','gahundaController@getagenda');

Route::get('/staff','empController@viewemployee');

Route::post('/password/email', 'OfficeAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
Route::post('/password/reset', 'OfficeAuth\ResetPasswordController@reset')->name('password.email');
Route::get('/password/reset', 'OfficeAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
Route::get('/password/reset/{token}', 'OfficeAuth\ResetPasswordController@showResetForm');
});
//Auth::routes();
Route::get('/dashboard', 'HomeController@index')->name('dashboard');
Auth::routes();
Route::group(['prefix' => 'getinfo'], function () {
Route::get('/login', 'GetinfoAuth\LoginController@showLoginForm')->name('login');
Route::post('/login', 'GetinfoAuth\LoginController@login')->name('supervisorlogin');
Route::post('/logout', 'GetinfoAuth\LoginController@logout')->name('logout');
Route::any('/getoffices','ibiroController@getofficecode');
Route::get('/office/{code}','ibiroController@getChildOffices');
/*Route::get('/register', 'GetinfoAuth\RegisterController@showRegistrationForm')->name('register');
Route::post('/register', 'GetinfoAuth\RegisterController@register');
*/
Route::post('/password/email', 'GetinfoAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
Route::post('/password/reset', 'GetinfoAuth\ResetPasswordController@reset')->name('password.email');
Route::get('/password/reset', 'GetinfoAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
Route::get('/password/reset/{token}', 'GetinfoAuth\ResetPasswordController@showResetForm');
});
