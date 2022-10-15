<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard',[\App\Http\Controllers\TodoController::class,'index'] )->middleware(['auth', 'verified'])->name('dashboard');

Route::post('/dashboard',[TodoController::class,'store'])->name('todo.store');

Route::patch('/{todo}',[TodoController::class,'update']);

Route::delete('/{todo}',[TodoController::class,'destroy']);

require __DIR__.'/auth.php';
