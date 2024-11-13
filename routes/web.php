<?php

use App\Http\Controllers\LaptopController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Route to display all laptops
    Route::get('/laptops', [LaptopController::class, 'index'])->name('laptop');

    // Route to show the form for adding a new laptop
    Route::get('/add-laptop', [LaptopController::class, 'create'])->name('add-laptop');

    // Route to handle the form submission for creating a new laptop
    Route::post('/add-laptop', [LaptopController::class, 'store'])->name('store-laptop');

    // Route to show the form for editing an existing laptop
    Route::get('/edit-laptop/{id}', [LaptopController::class, 'edit'])->name('edit-laptop');

    // Route to handle the form submission for updating an existing laptop
    Route::put('/update-laptop/{id}', [LaptopController::class, 'update'])->name('update-laptop');

    // Route to handle deleting a laptop
    Route::delete('/delete-laptop/{id}', [LaptopController::class, 'destroy'])->name('delete-laptop');


});

require __DIR__.'/auth.php';