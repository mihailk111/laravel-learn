<?php

use App\Http\Controllers\ZametkiController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [ZametkiController::class, "show_main"])->name('show_main');
Route::get('/zametka/create', [ZametkiController::class, "show_create"])->name("show_create_zametku");
Route::post('/zametka/create', [ZametkiController::class, "create"])->name("create_zametku");

Route::get('zametka/{id}', [ZametkiController::class, "show_zametku"])->name("show_zametku");