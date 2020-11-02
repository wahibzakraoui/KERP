<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
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



/*
|--------------------------------------------------------------------------
| Authenticated Routes
|--------------------------------------------------------------------------
|
| Authenticated endpoints only
|
*/
Route::group(['middleware' => 'api', 'prefix' => 'auth'], function ($router) {
    Route::post('login', [App\Http\Controllers\AuthController::class, 'login']);
    Route::get('logout', [App\Http\Controllers\AuthController::class, 'logout']);
    Route::post('refresh', [App\Http\Controllers\AuthController::class, 'refresh']);
    Route::get('me', [App\Http\Controllers\AuthController::class, 'me']);
});


/*
|--------------------------------------------------------------------------
| Lots Routes
|--------------------------------------------------------------------------
|
| Authenticated endpoints only
|
*/
Route::group(['middleware' => 'api'], function ($router) {
    Route::get('lot/{id}', [App\Http\Controllers\LotController::class, 'getLot']);
});

/*
|--------------------------------------------------------------------------
| Reception Routes
|--------------------------------------------------------------------------
|
| Authenticated endpoints only
|
*/
Route::group(['middleware' => ['api']], function ($router) {
    Route::get('receptions', [App\Http\Controllers\ReceptionController::class, 'index']);
    Route::get('receptions/{reception}', [App\Http\Controllers\ReceptionController::class, 'show']);
    Route::post('receptions', [App\Http\Controllers\ReceptionController::class, 'store']);
    Route::put('receptions/{reception}', [App\Http\Controllers\ReceptionController::class, 'update']);
    Route::delete('receptions/{reception}', [App\Http\Controllers\ReceptionController::class, 'destroy']);
});
