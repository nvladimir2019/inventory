<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', "MainController@index")->name('main');

Route::prefix('workplaces')->group(function() {
    Route::get('/', "WorkplacesController@index")->name('workplaces');
    Route::get('/add', "WorkplacesController@add")->name('add-workplace');
    Route::post('/add/save', "WorkplacesController@addSave")->name('add-save-workplace');
    Route::get('/read/{id}', "WorkplacesController@read")->name('read-workplace');
});

Route::get('inventory', "InventoryController@index")->name('inventory');
Route::get('directory', "DirectoryController@index")->name('directory');
