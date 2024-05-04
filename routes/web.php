<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::redirect('/register', '/login');
Route::redirect('/dashboard', '/login');

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/view-website/{website}', [HomeController::class, 'viewWebsite'])->name('view.website');

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'signin'])->name('signin');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
// Route::get('/register', [AuthController::class, 'register'])->name('register');
// Route::post('/register', [AuthController::class, 'signup'])->name('signup');

Route::group(['middleware' => 'auth'], function () {
  Route::prefix('admin/dashboard')->group(function () {
    Route::get('/', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    Route::get('/list-website', [AdminController::class, 'listWebsite'])->name('admin.website');
    Route::get('/add-website', [AdminController::class, 'addWebsite'])->name('admin.website.add');
    Route::post('/add-website', [AdminController::class, 'storeWebsite'])->name('admin.website.store');
    Route::get('/view-website/{website}', [AdminController::class, 'viewWebsite'])->name('admin.website.view');
    Route::get('/edit-website/{website}', [AdminController::class, 'editWebsite'])->name('admin.website.edit');
    Route::put('/edit-website/{website}', [AdminController::class, 'updateWebsite'])->name('admin.website.update');
    Route::delete('/delete-website/{website}', [AdminController::class, 'deleteWebsite'])->name('admin.website.delete');
  });
});
