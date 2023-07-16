<?php

use App\Http\Controllers\openaiController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [openaiController::class, 'chat'])->name('chat');
Route::any('/openai', [openaiController::class, 'openai'])->name('action.chat');