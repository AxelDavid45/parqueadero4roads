<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\API\VehicleController;
use \App\Http\Controllers\API\OwnerController;

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

Route::prefix('vehicle')->group(function () {
    Route::get('/brand', [VehicleController::class, 'countBrands']);
    Route::post('/', [VehicleController::class, 'store']);
    Route::get('/', [VehicleController::class, 'index']);
    Route::get('/{licensePlate}', [VehicleController::class, 'showByLicense']);
    Route::get('/owner/{name}', [OwnerController::class, 'showByName']);
    Route::get('/owner/identity/{identity}', [OwnerController::class, 'showByIdentity']);
});
