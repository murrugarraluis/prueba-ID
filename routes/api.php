<?php

use App\Http\Controllers\API\{
    AuthenticationController,
    GroupController,
};
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

Route::post('login', [AuthenticationController::class, 'login']);
Route::post('register', [AuthenticationController::class, 'register']);
Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('logout', [AuthenticationController::class, 'logout']);
    Route::post('groups/{group}/join', [GroupController::class, 'join']);
});
