<?php

use App\Http\Controllers\TimeSheetController;
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
Route::get('/schedule/export_to_excel', [ScheduleController::class, 'export_to_excel']);

Route::get('/time-sheet', [TimeSheetController::class, 'showAll']);


Route::get('/mode-add/{worker_id}', [ModeController::class, 'addOne']);

Route::get('/clear', function() {
    Artisan::call('cache:clear');
    Artisan::call('config:cache');
    Artisan::call('view:clear');
    Artisan::call('route:clear');
    Artisan::call('backup:clean');
    return "Кэш очищен.";
});
