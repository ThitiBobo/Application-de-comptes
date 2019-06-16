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


/** Les routes d'authentification **/
Auth::routes();

Route::get('/', 'LandingPageController@view');

/** Pages ne nécessitant pas d'authentification **/

Route::get('/wimw', 'LandingPageController@view');

Route::get('/wimw/contact', 'ContactController@view');
Route::post('/wimw/contact', 'ContactController@post');

Route::get('/wimw/about', 'AboutController@view');

Route::get('/wimw/help', 'HelpAndFaqController@view');

Route::get('/wimw/legal-terms', 'LegalTermsController@view');

Route::get('/wimw/privacy', 'PrivacyController@view');

/** Pages nécessitant une authentification **/

Route::get('/wimw/overview', 'SpendingPieChartController@dashboard');
Route::get('/wimw/overview-percent', 'SpendingPieChartController@dashboardPercents');
Route::get('/wimw/overview-month', 'SpendingPieChartController@dashboardMonth');
Route::get('/wimw/overview-year', 'SpendingPieChartController@dashboardYear');


Route::get('/wimw/list', 'SpendingListController@basicView');
Route::get('/wimw/list-ascending', 'SpendingListController@ascendingView');
Route::get('/wimw/list-descending', 'SpendingListController@descendingView');
Route::get('/wimw/list-this-month', 'SpendingListController@thisMonthView');
Route::get('/wimw/list-this-year', 'SpendingListController@thisYearView');

Route::get('/wimw/add-category', 'AddCategoryController@view');

Route::post('/wimw/add-category', 'AddCategoryController@post');

Route::get('/wimw/add-spending', 'AddSpendingController@view');

Route::get('/wimw/budget', 'BudgetController@view');


Route::post('/wimw/add-spending', 'AddSpendingController@post');


Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');