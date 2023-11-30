<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SupervisorController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DutiesController;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\VactionController;
use App\Http\Controllers\AbsentsController;
use App\Http\Controllers\Auth\ResetPasswordController;

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

Route::get('/admin_dashboard', [SupervisorController::class, 'index'])->name('super')->middleware('super');
Route::get('/display_calendar', [SupervisorController::class, 'display'])->name('super')->middleware('super');
Route::get('/tables', [SupervisorController::class, 'tablesView'])->name('tables')->middleware('super');
Route::get('/dutieSelection/{id}', [DutiesController::class, 'userSelection'])->name('dutieSelect')->middleware('super');
Route::get('/create_task', [DutiesController::class, 'index'])->name('task')->middleware('super');
Route::get('/vacation', [VactionController::class, 'index'])->name('vacation')->middleware('super');
Route::get('/vactionSelection/{id}', [VactionController::class, 'userSelection'])->name('vacationSelect')->middleware('super');
Route::get('/absents', [AbsentsController::class, 'index'])->name('absents')->middleware('super');
Route::get('/absentSelection/{id}', [AbsentsController::class, 'userSelection'])->name('absentSelect')->middleware('super');
Route::get('/load-events', [EventsController::class, 'loadEvents'])->name('routeLoadEvents')->middleware('super');
Route::get('/reset-password/{token}', [ResetPasswordController::class, 'resetLink']);

// Route::post('/store-duties', [DutiesController::class, 'store'])->name('duties')->middleware('super');

Route::get('/user_dashboard', [UserController::class, 'index'])->name('user')->middleware('user');

Route::resource('/posts', SupervisorController::class);
Route::resource('/posts_duties', DutiesController::class);
Route::resource('/posts_vacation', VactionController::class);
Route::resource('/posts_absent', AbsentsController::class);



