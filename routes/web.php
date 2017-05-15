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

Route::get('/home', 'HomeController@index');

Route::resource('members', 'MembersController');

Route::resource('roles', 'RolesController');

Route::resource('classrooms', 'ClassroomsController');

Route::resource('deviceCats', 'DeviceCatsController');

Route::resource('deviceLocations', 'DeviceLocationController');

Route::resource('deviceStatuses', 'DeviceStatusesController');

Route::resource('devices', 'DevicesController');

Route::resource('periodOfClasses', 'PeriodOfClassesController');

Route::resource('histories', 'historiesController');