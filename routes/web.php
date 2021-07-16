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
Route::get('/register', 'Auth\RegisterController@register')->name('register');
Route::post('/register', 'Auth\RegisterController@store')->name('register');
Auth::routes(['register' => false]);

Route::group(['middleware' => ['auth']],function ()
{
    Route::get('/home', 'TimesheetController@list')->name('home');
    Route::get('/profile','Auth\ProfileController@show')->name('profile');
    Route::post('/profile','Auth\ProfileController@update')->name('profile.update');
    Route::get('/profile/edit','Auth\ProfileController@edit')->name('profile.edit');
    Route::post('/profile/edit','Auth\ProfileController@edit')->name('profile.edit');

});

Route::get('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('timesheets/list','TimesheetController@list')->name('timesheets.list');
Route::get('timesheets','TimesheetController@index')->name('timesheets');
Route::get('timesheets/export/', 'TimesheetController@export')->name('timesheets.export');
Route::get('timesheets/team', 'TimesheetController@viewTimesheetsOfTeam')->name('timesheets.team');

Route::resource('timesheets', 'TimesheetController');
Route::resource('timesheets.tasks', 'TaskController');
Route::resource('teams', 'TeamController');

Route::get('reports', 'ReportController@index')->name('reports');
Route::post('reports/store', 'ReportController@store')->name('reports.store');
Route::get('reports/store', 'ReportController@store')->name('reports.store');

Route::get('users/index', 'UserController@index')->name('users.index');
Route::get('users/{user}', 'UserController@show')->name('users.show');
Route::get('users/{user}/edit', 'UserController@edit')->name('users.edit');
Route::put('users/{user}', 'UserController@update')->name('users.update');

Route::delete('users/{user}', 'UserController@destroy')->name('users.destroy');

