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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('home');

Route::get('/client/create', [App\Http\Controllers\ClientController::class, 'create'])->name('client.create');
Route::get('/client/{id}',[App\Http\Controllers\ClientController::class, 'show'])->name('client.show')->withoutMiddleware(['auth']);

Route::get('/task/create', [App\Http\Controllers\TaskController::class, 'create'])->name('task.create');

Route::get('/status/create', [App\Http\Controllers\StatusController::class, 'create'])->name('status.create');