<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');


Route::resource('members', 'MembersAPIController');

Route::resource('members', 'MembersAPIController');

Route::resource('roles', 'RolesAPIController');

Route::resource('classrooms', 'ClassroomsAPIController');

Route::resource('device_cats', 'DeviceCatsAPIController');

Route::resource('device_locations', 'DeviceLocationAPIController');

Route::resource('device_statuses', 'DeviceStatusesAPIController');

Route::resource('devices', 'DevicesAPIController');

Route::resource('period_of_classes', 'PeriodOfClassesAPIController');

Route::resource('histories', 'HistoryAPIController');

Route::resource('histories', 'HistoriesAPIController');

Route::resource('repairs', 'repairsAPIController');

Route::resource('repairs', 'repairsAPIController');

Route::resource('repairs', 'RepairsAPIController');