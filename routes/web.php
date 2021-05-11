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


Route::group(['middleware' => ['auth']],function ()
{
    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/profile','Auth\ProfileController@show')->name('profile');
    Route::post('/profile','Auth\ProfileController@update')->name('profile.update');
    Route::get('/profile/edit','Auth\ProfileController@edit')->name('profile.edit');
    Route::post('/profile/edit','Auth\ProfileController@edit')->name('profile.edit');

});

Route::get('logout', function ()
{
    auth()->logout();
    Session()->flush();
    return Redirect::to('/');
})->name('logout');
Route::get('timesheets/list','Timesheets\TimesheetController@list')->name('timesheets.list');
Route::get('timesheets','Timesheets\TimesheetController@index')->name('timesheets');

Route::resource('timesheets', 'Timesheets\TimesheetController');
Route::resource('tasks', 'Timesheets\TaskController');