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
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/profile','Auth\ProfileController@show')->name('profile');
    Route::post('/profile','Auth\ProfileController@update')->name('profile.update');
    Route::get('/profile/edit','Auth\ProfileController@edit')->name('profile.edit');
    Route::post('/profile/edit','Auth\ProfileController@edit')->name('profile.edit');

});

Route::get('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('timesheets/list','TimesheetController@list')->name('timesheets.list');
Route::get('timesheets','TimesheetController@index')->name('timesheets');

Route::resource('timesheets', 'TimesheetController');
Route::resource('timesheets.tasks', 'TaskController');

Route::get('reports', 'ReportController@index')->name('reports');
Route::post('reports/store', 'ReportController@store')->name('reports.store');
Route::get('reports/store', 'ReportController@store')->name('reports.store');
