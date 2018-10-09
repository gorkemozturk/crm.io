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
Route::get('settings', 'Settings\ShowSetting')->name('settings.index');

Route::get('firm/{id}/client/create', ['as' => 'directory.create', 'uses' => 'ClientController@create']);
Route::post('firm/{id}/client/store', ['as' => 'directory.store', 'uses' => 'ClientController@store']);

Route::resource('teams', 'TeamController');
Route::resource('firms', 'FirmController');
Route::resource('directory', 'ClientController')->except(['create', 'store']);

/*
|--------------------------------------------------------------------------
| Team Member Module Routes
|--------------------------------------------------------------------------
*/
Route::get('my-team/members', 'TeamMemberController@members')->name('member.list');
Route::get('my-team/applications', 'TeamMemberController@applications')->name('member.application');
Route::get('my-team/dashboard', 'TeamMemberController@dashboard')->name('member.dashboard');
Route::put('my-team/application/{id}/confirm', 'TeamMemberController@confirm')->name('member.confirm');
Route::post('my-team/application/{id}/apply', 'TeamMemberController@apply')->name('member.apply');
Route::delete('my-team/application/{id}/destroy', 'TeamMemberController@destroy')->name('member.destroy');

/*
|--------------------------------------------------------------------------
| Settings Module Routes
|--------------------------------------------------------------------------
*/
Route::prefix('settings')->group(function () {
    Route::resource('/sector', 'Settings\SectorController');
});
