<?php

use App\Http\Controllers\CatController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', [HomePageController::class, 'show'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/cat', [CatController::class, 'show'])->name('cat');
    Route::get('/cat/create', [CatController::class, 'create'])->name('cat.create');
    Route::get('/cat/{id}/edit', [CatController::class, 'edit'])->name('cat.edit');
    Route::post('/cat/create',[CatController::class, 'store'])->name('cat.store');
    Route::put('/cat/{id}', [CatController::class, 'update'])->name('cat.update'); 
    Route::delete('/cat/{id}', [CatController::class, 'destroy'])->name('cat.destroy');
   
});


require __DIR__.'/auth.php';
