<?php

use App\Http\Controllers\ResidentsController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('residents', ResidentsController::class);
Route::post('search/residents', [ResidentsController::class, "search"]);
Route::get('search/residents', [ResidentsController::class, "search"]);
Route::get('list/residents/{order?}/{sort?}/{limit?}', [ResidentsController::class, "list"]);
