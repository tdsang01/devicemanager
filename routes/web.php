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

Route::get('trathietbi/{id_history}', 'historiesController@trathietbi')->name('trathietbi');

Route::get('baohongthietbi/{id_history}', 'historiesController@baohongthietbi')->name('baohongthietbi');


Route::group(['prefix' => 'statistic'], function()
{
	Route::get('/', 'StatisticController@index')->name('statistic');
	
    Route::get('lecture/{id_role}', 'StatisticController@getAllLecture')->name('statistic_lecture');
    
	Route::get('statistic_by_lecture/{id_lecture}', 'StatisticController@statisticByIdLecture')->name('statistic_by_lecture');
    
	Route::get('statistic_time/{time_start}/{time_end}', 'StatisticController@statisticTime')->name('statistic_time');

	Route::get('statistic_borrowing', 'StatisticController@statisticBorrowing')->name('statistic_borrowing');

	Route::get('statistic_frequency', 'StatisticController@statisticFrequency')->name('statistic_frequency');
	Route::get('statistic_current_lecture/{id_lecture}', 'StatisticController@statisticCurrentLecture')->name('statistic_current_lecture');
	
});


Route::resource('repairs', 'RepairsController');

Route::get('report/{id_device}', 'RepairsController@filter')->name('report');

Route::get('repairs_device/{id}', 'RepairsController@repairDevice')->name('repairs_device');

Route::get('view_repair_by_id/{id}', 'DevicesController@viewRepairById')->name('view_repair_by_id');