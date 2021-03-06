<?php

use Illuminate\Support\Facades\Route;

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

/*
|
| Auth Page Routes Views
|
*/
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::get('email/verify', 'Auth\VerificationController@show')->name('verification.notice');
Route::get('email/verify/{id}/{hash}', 'Auth\VerificationController@verify')->name('verification.verify');

/*
|
| Other Page Routes Views
|
*/
Route::get('/', 'HomeController@mainPage')->name('mainpage');

Route::get('/restaurants', 'RestaurantsViewController@restaurantsPage')->name('restaurants');
Route::get('/restaurants/{restaurant}', 'RestaurantsViewController@restaurantPage')->name('restaurant');

Route::get('/account', 'UserViewController@userAccountPage')->name('user.account');

Route::get('/landingpage', 'LandingPageController@landingPage')->name('landingpage');

/*
|
| Order Routes Views
|
*/
Route::get('/order/{order}/delivery-address', 'OrderViewController@deliveryAddressPage');
Route::get('/order/{order}/delivery-time', 'OrderViewController@deliveryTimePage');
Route::get('/order/{order}/payment', 'OrderViewController@paymentPage');

Route::get('/order/{id}', 'OrderViewController@informationPage');
