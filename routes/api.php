<?php

use App\Http\Controllers\KendaraanController;
use App\Http\Controllers\MobilController;
use App\Http\Controllers\MotorController;
use App\Models\Kendaraan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::get('/kendaraan', [KendaraanController::class, 'getKendaraan']);
// Route::post('/addkendaraan', [KendaraanController::class, 'addKendaraan']);
// Route::post('/addkendaraan', [KendaraanController::class, 'addKendaraan']);
Route::resource('kendaraan', KendaraanController::class);
Route::resource('motor', MotorController::class);
Route::resource('mobil', MobilController::class);
