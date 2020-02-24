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
// show home
Route::get('/', 'HomeController@showHome' );

//create account

Route::post('/create', 'CreateAccountsController@createAccount');

//fund account

Route::match(['get', 'put'],'/fund', 'FundAccountsController@fundAccount');

Route::match(['get', 'put'],'/withdraw', 'WithdrawFundsController@withdrawFund');