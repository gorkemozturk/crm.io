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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/settings', 'Settings\ShowSetting')->name('settings.index');

Route::resource('/team', 'TeamController');

Route::post('team/{id}/apply', 'TeamMemberController@apply')->name('member.apply');
