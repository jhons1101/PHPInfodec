<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PruebaController;

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

Route::get('/', [HomeController::class, 'index']);

Route::get('/createNote', [HomeController::class, 'createNote']);

Route::post('/newNota', [HomeController::class, 'newNota']);

Route::delete('/delNota', [HomeController::class, 'delNota']);

Route::get('notes/exportExcel/', [HomeController::class, 'exportExcel']);

Route::get('notes/importExcel/', [HomeController::class, 'importExcel']);

Route::get('notes/exportPDF/', [HomeController::class, 'exportPDF']);

Route::get('/prueba/export', [PruebaController::class, 'export'])->name('exportExcel');

Route::get('/prueba/callJob', [PruebaController::class, 'callJob'])->name('callJob');

