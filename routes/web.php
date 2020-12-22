<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\NoteController;

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


Auth::routes();

Route::get('/', function () {
    return redirect()->route('home');
});

Route::get('/home', [NoteController::class, 'index'])->name('home');
Route::get('/note/new', [NoteController::class, 'new'])->name('new');
Route::get('/note/{id}/edit', [NoteController::class, 'edit'])->name('edit');

Route::post('/note/create', [NoteController::class, 'create'])->name('create');
Route::post('/note/{note}/update', [NoteController::class, 'update'])->name('update');
Route::post('/note/{note}/delete', [NoteController::class, 'delete'])->name('delete');