<?php

use App\Http\Controllers\PublicController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\SearchController;
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

Route::get('/', [PublicController::class,'index']);
Route::get('/login', [AuthController::class, 'index'])->name('.login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/registrasi', [AuthController::class, 'registrasi']);
Route::post('/register', [AuthController::class, 'register']);
Route::get('/view_image/{id}', [PublicController::class, 'view_image']);


Route::middleware(['auth'])->group(function () {
    Route::get('/page', [GalleryController::class, 'index']);
    Route::get('/data', [GalleryController::class, 'data']);
    Route::get('/data_saya', [GalleryController::class, 'data_saya']);
    Route::post('/store', [GalleryController::class, 'store']);
    Route::get('/logout', [AuthController::class, 'logout']);
    Route::put('/image/{id}/edit', [GalleryController::class, 'update'])->name('item.edit');
    Route::delete('/delete/{id}', [GalleryController::class, 'destroy'])->name('image.destroy');
    Route::get('/search', [SearchController::class, 'search'])->name('search');
    Route::post('/comments', [GalleryController::class, 'storeComment'])->name('comments.store');
    Route::get('/view/{id}', [GalleryController::class, 'view'])->middleware('web');
});
