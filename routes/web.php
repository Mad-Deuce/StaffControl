<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WorkerController;
use App\Http\Controllers\ModeController;
use App\Http\Controllers\ScheduleController;

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
Artisan::call('view:clear');


Route::get('/', function () {
    return view('mainPage');
});

Route::get('/worker-list', [WorkerController::class, 'showAll']);
Route::get('/worker-delete/{id}', [WorkerController::class, 'deleteOne']);
Route::get('/worker-add', [WorkerController::class, 'addOne']);

Route::get('/schedule', [ScheduleController::class, 'showAll']);
Route::get('/schedule/add_from_modes', [ScheduleController::class, 'add_from_modes']);
Route::get('/schedule/add_from_system_calendar', [ScheduleController::class, 'add_from_system_calendar']);
Route::get('/schedule/delete', [ScheduleController::class, 'delete']);

Route::get('/mode-add/{worker_id}', [ModeController::class, 'addOne']);
