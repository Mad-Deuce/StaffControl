<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WorkerController;
use App\Http\Controllers\ModeController;

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
    return view('mainPage');
});

Route::get('/worker-list', [WorkerController::class, 'showAll']);
Route::get('/worker-delete/{id}', [WorkerController::class, 'deleteOne']);
Route::get('/worker-add', [WorkerController::class, 'addOne']);

Route::get('/schedule', [ScheduleController::class, 'showAll']);

Route::get('/mode-add/{worker_id}', [ModeController::class, 'addOne']);
