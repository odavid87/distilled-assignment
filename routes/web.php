<?php

use App\Http\Controllers\BeerController;
use App\Http\Controllers\OrderReplyController;
use Carbon\Carbon;
use Illuminate\Support\Facades\Route;
use Webklex\IMAP\Facades\Client;

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
Route::get('/', function(){
    return view('home');
});
