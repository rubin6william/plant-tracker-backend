<?php

use App\Http\Controllers\PlantController;
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

Route::prefix('plants')->group(function() {
   Route::get('', PlantController::class . '@index')->name('plants.index');
   Route::post('', PlantController::class . '@store')->name('plants.store');
});
