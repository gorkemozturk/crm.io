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

Route::resource('/teams', 'TeamController');

/*
|--------------------------------------------------------------------------
| Team Member Module Routes
|--------------------------------------------------------------------------
*/
Route::post('myteam/application/{id}/apply', 'TeamMemberController@apply')->name('member.apply');
Route::delete('myteam/application/{id}/destroy', 'TeamMemberController@destroy')->name('member.destroy');
Route::put('myteam/application/{id}/confirm', 'TeamMemberController@confirm')->name('member.confirm');
Route::get('myteam/members', 'TeamMemberController@members')->name('member.list');
Route::get('myteam/applications', 'TeamMemberController@applications')->name('member.application');
