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

    Route::get('/profile','Auth\ProfileController@index')->name('profile');
    Route::post('/profile','Auth\ProfileController@update')->name('profile');
});

Route::get('logout', function ()
{
    auth()->logout();
    Session()->flush();
    return Redirect::to('/');
})->name('logout');
Route::get('/timesheets','Timesheets\TimeSheetController@index')->name('timesheets');
Route::resource('timesheets', 'Timesheets\TimeSheetController');
