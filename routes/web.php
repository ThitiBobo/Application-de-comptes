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

Route::get('/', function ()
{
    return view('welcome');
});

/** Les routes d'authentification **/
Auth::routes();


/** Pages ne nécessitant pas d'authentification **/

Route::get('/wimw', 'LandingPageController@view');

Route::get('/wimw/contact', 'ContactController@view');

Route::get('/wimw/about', 'AboutController@view');

Route::get('/wimw/help', 'HelpAndFaqController@view');

Route::get('/wimw/legal-terms', 'LegalTermsController@view');

Route::get('/wimw/privacy', 'PrivacyController@view');

/** Pages nécessitant une authentification **/

Route::get('/wimw/overview', 'SpendingPieChartController@dashboard');

Route::get('/wimw/list', 'SpendingListController@view');

Route::get('/wimw/add-category', 'AddCategoryController@view');

Route::post('/wimw/add-category', 'AddCategoryController@post');




/** tests **/

Route::get('/template', function()
{
    return view('template');
});