<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\MusicController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('register', [AuthController::class, 'register']);
Route::post('logout', [AuthController::class, 'logout']);
Route::post('login', [AuthController::class, 'login']);

Route::apiResource('musics', MusicController::class);

Route::get('call-command', function() {
  Artisan::call('optimize:clear');
  Artisan::call('migrate:refresh --seed'); 
  
  return "Commands executed successfully";
});