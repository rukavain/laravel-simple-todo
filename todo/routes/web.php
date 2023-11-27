<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [TodoController::class, 'index'])->name('todo.index');
Route::get('/create', [TodoController::class, 'create'])->name('todo.create');
Route::post('/', [TodoController::class, 'store'])->name('todo.store');
Route::delete('/{todo}/destroy', [TodoController::class, 'destroy'])->name('todo.destroy');
Route::get('/{todo}/edit', [TodoController::class, 'edit'])->name('todo.edit');
Route::put('/{todo}/update', [TodoController::class, 'update'])->name('todo.update');