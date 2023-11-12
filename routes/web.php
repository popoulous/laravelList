<?php

use App\Http\Controllers\AjaxController;
use App\Http\Controllers\ListController;
use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/',         [ListController::class, 'index']);
Route::get('/delete',   [ListController::class, 'delete']);
Route::post('/store',   [ListController::class, 'store']);
Route::post('/edit',     [ListController::class, 'edit']);

Route::post('/ajax',    [AjaxController::class, 'get']);

Route::get('/todo',     [TodoController::class, 'detail']);
