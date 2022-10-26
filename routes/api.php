<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\HTTP\Controllers\API;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('clients/{executive_id}', [App\Http\Controllers\API::class, 'fetchClients']);
Route::get('executives', [App\Http\Controllers\API::class, 'fetchExecutives']);
Route::get('tasks/{id}/{executive_id}', [App\Http\Controllers\API::class, 'fetchTasks']);
Route::post('verifyClient', [App\Http\Controllers\API::class, 'verifyClient']);
Route::post('verifyOtp', [App\Http\Controllers\API::class, 'verifyOtp']);
Route::post('fetchStatus', [App\Http\Controllers\API::class, 'fetchStatus']);