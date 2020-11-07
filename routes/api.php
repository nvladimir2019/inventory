<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('get/building', 'WorkplacesController@getBuilding');
Route::post('get/floor', 'WorkplacesController@getFloor');
Route::post('get/room', 'WorkplacesController@getRoom');
Route::post('get/workplaces', 'WorkplacesController@getWorkplaces');
Route::post('get/workplaces/byDepartmentId', 'WorkplacesController@getByDepartmentId');
Route::post('get/models', 'InventoryController@getModels');
Route::post('get/inventory/withInventoryNumbers', 'InventoryController@withInventoryNumbers');
Route::post('get/inventory/byWorkplaceId', 'InventoryController@getByWorkplaceId');
Route::post('get/employees', 'EmployeesController@getByFilter');
