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
    Route::post('/add/save', "WorkplacesController@addSave")->name('add-save-workplace');
    Route::get('/read/{id}', "WorkplacesController@read")->name('read-workplace');
});

Route::prefix('inventory')->group(function() {
    Route::get('/', "InventoryController@index")->name('inventory');
    Route::post('/add', "InventoryController@add")->name('add-inventory');
    Route::get('/read/{id}', "InventoryController@read")->name('read-inventory');
});

Route::get('directory', "DirectoryController@index")->name('directory');
