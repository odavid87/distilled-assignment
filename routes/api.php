<?php

use App\Http\Controllers\API\BeerController;
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

Route::get('/beer', [BeerController::class, 'index']);
Route::get('/beer/random', [BeerController::class, 'random']);
