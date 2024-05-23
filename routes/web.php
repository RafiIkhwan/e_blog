<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomepageController::class, 'index'])->name('homepage');
Route::get('/article/{slug}', [HomepageController::class, 'detail'])->name('detail.article');

// Authentication
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.action');

Route::get('/register', [LoginController::class, 'register'])->name('register');
Route::post('/register', [LoginController::class, 'register_store'])->name('register.store');

Route::middleware('auth')->group(function() {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/logout', [LoginController::class, 'logout_handler']);
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    Route::get('/create_article', [ArticleController::class, 'index'])->name('create.article');
    Route::post('/create_article', [ArticleController::class, 'publish'])->name('publish');

    Route::get('/p/{slug}/edit', [ArticleController::class, 'edit'])->name('edit.article');
    Route::post('/p/{slug}/edit', [ArticleController::class, 'update'])->name('update.article');
    Route::delete('/p/{id}/delete', [ArticleController::class, 'delete'])->name('delete.article');
});