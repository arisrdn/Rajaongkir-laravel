<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Test;
use App\Http\Controllers\RajaOngkirController;


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


Route::get('/test', [Test::class, 'index']);
Route::get('/', [RajaOngkirController::class, 'index']);
Route::get('/getCity/ajax/{id}', [RajaOngkirController::class, 'getCitiesAjax']);