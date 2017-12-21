<?php

use App\User;
use App\Package;

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

//payment page
Route::get('/payment2',
['uses'=>'PaymentController@getPayment',
'as'=>'payment.show']);

//payment receipt page
Route::get('/payment3',
['uses'=>'PaymentController@getPaymentResponse',
'as'=>'front.fakepaymentresponse']);

//usertype
Route::prefix('usertype')->group(function(){

    Route::get('/','UserTypeController@index')->name('usertype.dashboard');
    Route::get('/create', 'UserTypeController@create')->name('usertype.create');
    Route::post('/create', 'UserTypeController@store')->name('usertype.store');
    Route::get('/show/{id}', 'UserTypeController@show')->name('usertype.show');
    Route::get('/edit/{id}', 'UserTypeController@edit')->name('usertype.edit');
    Route::put('/edit/{id}', 'UserTypeController@update')->name('usertype.update');
    Route::delete('/delete/{id}', 'UserTypeController@destroy')->name('usertype.delete');

});

//staff
Route::prefix('staff')->group(function(){
Route::get('/','StaffController@index')->name('staff.dashboard');
Route::get('/login','Auth\StaffLoginController@showLoginForm')->name('staff.login');
Route::post('/login','Auth\StaffLoginController@login')->name('staff.login.submit');
Route::get('/logout','Auth\StaffLoginController@staffLogout')->name('staff.logout');
});

//admin
Route::prefix('admin')->group(function(){
Route::get('/dashboard',['middleware' => 'auth', 'admin','uses'=>'AdminController@index'])->name('admin.dashboard');
Route::get('/login','Auth\AdminLoginController@showLoginForm')->name('admin.login');
Route::post('/login','Auth\AdminLoginController@login')->name('admin.login.submit');
Route::get('/logout','Auth\AdminLoginController@logout')->name('admin.alogout');

//Password Reset Routes
Route::post('/password/email','Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
Route::get('/password/reset','Auth\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
Route::post('/password/reset','Auth\AdminResetPasswordController@reset');
Route::get('/password/reset/{token}','Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset');

});

//Organization CRUD
Route::prefix('org')->group(function(){
Route::get('/', 'OrgController@getOrganization')->name('org.dashboard');
Route::get('/create', 'OrgController@createOrganization')->name('org.create');
Route::post('/create', 'OrgController@store')->name('org.create.submit');
Route::get('/show/{id}', 'OrgController@show')->name('org.show');
Route::get('/edit/{id}', 'OrgController@edit')->name('org.edit');
Route::put('/edit/{id}', 'OrgController@update')->name('org.update');
Route::delete('/delete/{id}', 'OrgController@destroy')->name('org.delete');
//organization market
Route::get('/market','OrgMarketController@index')->name('front.orgmarket');
Route::get('/details/{id}','OrgMarketController@show')->name('front.orgdetails');
});

//Artist CRUD
Route::prefix('artist')->group(function(){
Route::get('/','ArtistController@getArtist')->name('artist.dashboard');
   Route::get('/create','ArtistController@createArtist')->name('artist.create');
   Route::post('/create','ArtistController@store')->name('artist.create.submit');
   Route::get('/show/{id}','ArtistController@show')->name('artist.show');
   Route::get('/edit/{id}','ArtistController@edit')->name('artist.edit');
   Route::put('/edit/{id}','ArtistController@update')->name('artist.update');
   Route::delete('/delete/{id}','ArtistController@destroy')->name('artist.delete');

   //Show organization of artist
   Route::get('/market','ArtistController@index')->name('front.artist');
   Route::get('/details/{id}','ArtistController@show1')->name('front.artistdetails');
});

//Service CRUD
Route::prefix('service')->group(function(){
    Route::get('/','ServiceController@index')->name('service.dashboard');
    Route::get('/create','ServiceController@createService')->name('service.create');
    Route::post('/create','ServiceController@store')->name('service.create.submit');
    Route::get('/show/{id}','ServiceController@show')->name('service.show');
    Route::get('/edit/{id}','ServiceController@edit')->name('service.edit');
    Route::put('/edit/{id}','ServiceController@update')->name('service.update');
    Route::delete('/delete/{id}','ServiceController@destroy')->name('service.delete');
});

//Event CRUD
Route::prefix('event')->group(function(){

    Route::get('/','EventController@index')->name('event.dashboard');
    Route::get('/create','EventController@createEvent')->name('event.create');
    Route::post('/create','EventController@store')->name('event.create.submit');
    Route::get('/show/{id}','EventController@show')->name('event.show');
    Route::get('/edit/{id}','EventController@edit')->name('event.edit');
    Route::put('/edit/{id}','EventController@update')->name('event.update');
    Route::delete('/delete/{id}','EventController@destroy')->name('event.delete');

});

//Feedback CRUD
Route::prefix('feedback')->group(function(){
    Route::get('/','FeedbackController@index')->name('feedback.dashboard');
    Route::get('/create','FeedbackController@createFeed')->name('feedback.create');
    Route::post('/create','FeedbackController@store')->name('feedback.create.submit');
    Route::get('/show/{id}','FeedbackController@show')->name('feedback.show');
    Route::get('/edit/{id}','FeedbackController@edit')->name('feedback.edit');
    Route::put('/edit/{id}','FeedbackController@update')->name('feedback.update');
    Route::delete('/delete/{id}','FeedbackController@destroy')->name('feedback.delete');
   Route::get('/','FeedbackController@getFeedback')->name('feedback.dashboard');
   Route::post('/store','FeedbackController@storeFeedback')->name('feedback.store');

});

//main
Route::get('/','FrontController@index');

//About Us
Route::get('/AboutUs','FrontController@AboutUs');

//org detail
Route::get('/detail','FrontController@test');

//org detail
Route::get('/details','FrontController@testtest');

//Feedback OR Contact Form
Route::get('/ContactUs','ContactUsController@index');
Route::post('/ContactUs','ContactUsController@postContact');



//Route::get('/product',
//['uses'=>'HandicraftController@getHandicraft',
//'as'=>'front.product']);


//master
Route::get('/master','FrontController@master');

//master2
Route::get('/master2','FrontController@mastertest');

//master3
Route::get('/master3','FrontController@mastertesttest');

Route::group(['prefix' => 'user'], function(){
    Route::group(['middleware'=>'guest'],function(){
    //register->signup
    Route::get('/signup',[
    'uses'=>'UserController@getSignup',
    'as' => 'user.signup'
    ]);

    Route::post('/signup',[
        'uses' => 'UserController@postSignup',
        'as' => 'user.signup'
    ]);

    //register->signin
    Route::get('/signin',[
        'uses'=>'UserController@getSignin',
        'as' => 'user.signin'

    ]);
    Route::post('/signin',[
        'uses' => 'UserController@postSignin',
        'as' => 'user.signin'

    ]);
    });
});

//original template
Route::get('/menu', 'PagesController@index');

Auth::routes();

Route::resource('profiles','ProfilesController');

Route::get('/changepassword',['middleware' => 'auth', 'uses' => 'ChangePasswordController@chgPassForm']);

Route::post('change/password','ChangePasswordController@chgPassFormPost');

Route::get('/change/succeed', function(){
     return view('auth.passwords.change_succeed');
});
Route::group(['middleware'=>'auth'],function(){
    //profile
    Route::get('/profile',[
    'uses'=>'UserController@getProfile',
    'as' => 'user.profile'
    ]);
  //logout
    Route::get('/logout',[
        'uses' => 'Auth\LoginController@userLogout',
        'as' => 'user.ulogout'
    ]);
});



//This URL brings you to TestDB controller's index page for testing your DB connection settings.
// Route::get('/testdb', 'TestDBController@index');
// Auth::routes();

//resources routes
Route::resource('store','StoreController');

Route::resource('product','ProductController');

Route::resource('services','ServicesController');

Route::resource('events','EventsController');

Route::resource('cartItem','CartItemController');

Route::resource('payment','PaymentController');

Route::put('/addtocart/{id?}/addtoproduct',['as' => 'product.addToCart','uses'=> 'ProductController@addToCart']);

Route::put('/addtocart/{id?}/addtoservice',['as' => 'services.addToCart','uses'=> 'ServicesController@addToCart']);

Route::get('/store/{id?}/addnewproduct',['as'=>'store.addNewProduct', 'uses'=>'StoreController@addNewProduct']);

Route::get('/store/{id?}/addnewservice',['as'=>'store.addNewService', 'uses'=>'StoreController@addNewService']);

Route::get('/store/{id?}/addnewevent',['as'=>'store.addNewEvent', 'uses'=>'StoreController@addNewEvent']);

Route::get('/store/{id?}/editSeller',['as'=>'store.editSeller', 'uses'=>'StoreController@editSeller']);

Route::put('/store/{id?}/updateSeller',['as'=>'store.updateSeller', 'uses'=>'StoreController@updateSeller']);

Route::get('/org/{id?}/addnewstore',['as' => 'OrgProfileController.addNewStore','uses'=> 'OrgProfileController@addNewStore']);

Route::get('/org/{id?}/addnewevent',['as' => 'OrgProfileController.addNewEvent','uses'=> 'OrgProfileController@addNewEvent']);

Route::get('/org/{id?}/addnewstore2',['as' => 'organization.addNewStore','uses'=> 'OrgController@addNewStore']);

Route::get('/org/{id?}/addnewevent2',['as' => 'organization.addNewEvent','uses'=> 'OrgController@addNewEvent']);

Route::post('/searchProduct','ProductController@searchProduct');

Route::put('/product-addtocart/{id?}',['as' => 'product.addToCart','uses'=> 'ProductController@addToCart']);

Route::put('/service-addtocart/{id?}',['as' => 'services.addToCart','uses'=> 'ServicesController@addToCart']);

Route::put('/event-addtocart/{id?}',['as' => 'events.addToCart','uses'=> 'eventsController@addToCart']);

Route::get('/checkout/{id?}',['as' => 'cartItem.checkOut','uses'=> 'CartItemController@checkOut']);

Route::put('/approve_Product/{id?}',['as' => 'product.approveProduct','uses'=> 'ProductController@approveProduct']);

Route::put('/reject_Product/{id?}',['as' => 'product.rejectProduct','uses'=> 'ProductController@rejectProduct']);

Route::put('/approve_Service/{id?}',['as' => 'service.approveService','uses'=> 'ServicesController@approveService']);

Route::put('/reject_Service/{id?}',['as' => 'service.rejectService','uses'=> 'ServicesController@rejectService']);

//Route to request page
/*Route::get('/request', function () {
    return view('payment.request');
});

//Route to response page
Route::get('/response', function () {
    return view('payment.response');
});

//Route to requery page
Route::get('/requery', function () {
    return view('payment.requery');
});

Route::get('/ipay88', function () {
    return view('payment.Ipay88');
});*/

/*Route::get('/fakepaymentresponse', function () {
    return view('payment.fakepaymentresponse');
});*/

/*Route::get('/entry', function () {
    return view('https://www.mobile88.com/epayment/entry.asp');
});*/

//Route::get('/fakepaymentresponse','PaymentController@getUserInput');

Route::get('/fakepaymentresponse','PaymentController@getPaymentDetails');

Route::post('/response','PaymentController@getMerchantDetails');

Route::get('/fakepaymentresponse',
['uses'=>'PaymentController@getPaymentResponse',
'as'=>'front.fakepaymentresponse']);

Route::get('/fakepaymentresponse',
['uses'=>'PaymentController@getPaymentDetails',
'as'=>'front.fakepaymentresponse']);

//Route::post('/entry', 'PaymentController@postPaymentDetails');
Route::put('/membership/pay/{membership_id}',['uses' => 'MembershipController@orgFeePayment'])->name('membership-pay');

Route::put('/membership/renew/{membership_id}',['uses' => 'MembershipController@orgRenew'])->name('membership-renew');

Route::resource('membership','MembershipController');

Route::resource('packages','PackageController');

Route::get('/privateSellerRegister', 'PrivateSellerRegisterController@create')->name('ShowPrivateRegister');

Route::post('/privateSellerRegister', 'PrivateSellerRegisterController@store')->name('PrivateRegister');

Route::get('/orgSellerRegister/user_info', 'OrgSellerRegisterController@create')->name('ShowOrgRegisterStep1');

Route::post('/orgSellerRegister/user_info', 'OrgSellerRegisterController@store')->name('OrgRegisterStep1');

Route::get('/orgSellerRegister/package_select', 'MembershipController@create')->name('ShowOrgRegisterStep2');

Route::post('/orgSellerRegister/package_select', 'MembershipController@store')->name('OrgRegisterStep2');

Route::resource('private_profiles','PrivateProfileController');

Route::resource('org_profiles','OrgProfileController');

Route::get('/admin',['middleware' => 'auth', 'admin','uses'=>'AdminController@show']);

Route::get('/admin/register',['middleware' => 'auth', 'admin','uses'=>'AdminRegisterController@create'])->name('ShowAdminRegister');

Route::post('/admin/register',['middleware' => 'auth', 'admin','uses'=>'AdminRegisterController@store'])->name('AdminRegister');

Route::get('/admin/approval',['middleware' => 'auth', 'admin','uses'=>'AdminFunctionController@index'])->name('ShowAdminApproval');

Route::post('/admin/search',['middleware' => 'auth', 'admin','uses'=>'AdminFunctionController@search'])->name('AdminSearch');

Route::get('/admin/approve',['middleware' => 'auth', 'admin','uses'=>'AdminFunctionController@approve'])->name('AdminApprove');

Route::get('/admin/membership',['middleware' => 'auth', 'admin','uses'=>'AdminFunctionController@membershipNotify'])->name('MembershipManagement');

Route::get('/admin/membershipManagement',['middleware' => 'auth', 'admin','uses'=>'AdminFunctionController@showMembership'])->name('ShowMembership');

Route::get('/admin/packageManagement',['middleware' => 'auth', 'admin','uses'=>'PackageController@index'])->name('PackageList');

Route::post('/admin/packageManagement',['middleware' => 'auth', 'admin','uses'=>'PackageController@packageAction'])->name('PackageManagement');

//BlackFriday
Route::get('/blackfriday','FrontController@blackfriday');

//StoresMarket
Route::get('/storedetails/{id}',['as' => 'front.storedetails','uses'=>'FrontController@storedetails']);

//Handicraft Fair
Route::get('/handicraftfair','FrontController@handicraftfair');
