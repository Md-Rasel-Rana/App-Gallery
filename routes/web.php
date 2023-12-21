<?php

use App\Http\Controllers\PhotoController;
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

Route::get('/',[PhotoController::class,'index'])->name('albums.index');
Route::get('/albums/create',[PhotoController::class,'createalbum'])->name('albums.create');
Route::post('/albums/store',[PhotoController::class,'storealbum'])->name('albums.store');
Route::delete('/albums/delete{id}',[PhotoController::class,'deletealbum'])->name('delete.album');